<?php namespace Vindi;

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
     * @var mixed
     */
    public $lastResponse;

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
        try {
            $response = $this->client->request($method, $endpoint, $options);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }

        return $this->response($response);
    }

    /**
     * @param mixed $response
     *
     * @return object
     */
    public function response($response)
    {
        $this->lastResponse = $response;

        $content = $response->getBody()->getContents();

        $decoded = json_decode($content); // parse as array
        reset($decoded);
        $data = current($decoded); // get first attribute from array, e.g.: subscription, subscriptions, errors.

        $this->checkRateLimit($response)
            ->checkForErrors($response, $data);

        return $data;
    }

    /**
     * @param $response
     *
     * @return $this
     * @throws \Vindi\Exceptions\RateLimitException
     */
    private function checkRateLimit($response)
    {
        $remaining = $response->getHeader('Rate-Limit-Remaining') ? (int) $response->getHeader('Rate-Limit-Remaining')[0] : false;

        if ($remaining === 0) {
            throw new RateLimitException($response);
        }

        return $this;
    }

    /**
     * @param mixed $response
     * @param mixed $data
     *
     * @return $this
     * @throws \Vindi\Exceptions\RequestException
     */
    private function checkForErrors($response, $data)
    {
        $status = $response->getStatusCode();

        $data = (array) $data;

        $statusClass = (int) ($status / 100);

        if (($statusClass === 4) || ($statusClass === 5)) {
            switch ($status) {
                case 422:
                    throw new ValidationException($status, $data);
                    break;
                default:
                    throw new RequestException($status, $data);
                    break;
            }
        }

        return $this;
    }
}