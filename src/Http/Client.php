<?php namespace Vindi\Http;

use GuzzleHttp\Client as Guzzle;

use Vindi\Vindi;

class Client
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var mixed
     */
    public $lastResponse;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $vindi = new Vindi;

        $this->client = new Guzzle([
            'base_uri'        => Vindi::$apiBase,
            'auth'            => [$vindi->getApiKey(), '', 'BASIC'],
            'request.options' => [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'User-Agent'   => 'Vindi-PHP/' . Vindi::$sdkVersion,
                ],
            ],
            'timeout'         => 60,
        ]);
    }

    /**
     * @param string $method The HTTP method being used
     * @param string $uri    The URI being requested, including domain and protocol
     * @param array  $options
     *
     * @return mixed
     */
    public function request($method, $uri = null, array $options = [])
    {
        return $this->lastResponse = $this->client->request($method, $uri, $options);
    }
}