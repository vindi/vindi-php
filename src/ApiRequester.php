<?php

namespace Vindi;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\ClientException;
use Vindi\Exceptions\ValidationException;
use Vindi\Http\Client;
use Vindi\Exceptions\RequestException;
use Vindi\Exceptions\RateLimitException;

class ApiRequester
{
    /**
     * @var \Vindi\Http\Client
     */
    public $client;

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    public $lastResponse;

    /**
     * @var array
     */
    public $lastOptions;

    /**
     * ApiRequester constructor.
     */
    public function __construct()
    {
        $this->client = new Client;
    }

    /**
     * @param string $method   HTTP Method.
     * @param string $endpoint Relative to API base path.
     * @param array  $options  Options for the request.
     *
     * @return mixed
     */
    public function request($method, $endpoint, array $options = [])
    {
        $this->lastOptions = $options;
        try {
            $response = $this->client->request($method, $endpoint, $options);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }

        \Yii::$app->logHandler->run(print_r(json_decode($response->getBody()->getContents(),true),true), 'APIRequest');

        return $this->response($response);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return object
     */
    public function response(ResponseInterface $response)
    {
        $this->lastResponse = $response;

        $content = $response->getBody()->getContents();

        $decoded = json_decode($content); // parse as object
        reset($decoded);
        $data = current($decoded); // get first attribute from array, e.g.: subscription, subscriptions, errors.

        $this->checkRateLimit($response)
            ->checkForErrors($response, $data);

        return $data;
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return $this
     * @throws \Vindi\Exceptions\RateLimitException
     */
    private function checkRateLimit(ResponseInterface $response)
    {
        if (429 === $response->getStatusCode()) {
            throw new RateLimitException($response);
        }

        return $this;
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param mixed                     $data
     *
     * @return $this
     * @throws \Vindi\Exceptions\RequestException
     */
    private function checkForErrors(ResponseInterface $response, $data)
    {
        $status = $response->getStatusCode();

        $data = (array) $data;

        $statusClass = (int) ($status / 100);

        if (($statusClass === 4) || ($statusClass === 5)) {
            switch ($status) {
                case 422:
                    throw new ValidationException($status, $data, $this->lastOptions);
                default:
                    throw new RequestException($status, $data, $this->lastOptions);
            }
        }

        return $this;
    }
}
