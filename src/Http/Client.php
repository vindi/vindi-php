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
     * Client constructor.
     */
    public function __construct()
    {
        $vindi = new Vindi;

        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';

        $this->client = new Guzzle([
            'base_uri'        => Vindi::$apiBase,
            'auth'            => [$vindi->getApiKey(), '', 'BASIC'],
            'request.options' => [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'User-Agent'   => trim('Vindi-PhpSdk/' . Vindi::$sdkVersion . "; {$host}"),
                ],
            ],
            'verify'  => $vindi->getCertPath(),
            'timeout' => 60,
            'curl.options' => [
                'CURLOPT_SSLVERSION' => 'CURL_SSLVERSION_TLSv1_2',
            ]
        ]);
    }

    /**
     * @param string $method The HTTP method being used
     * @param string $uri    The URI being requested, including domain and protocol
     * @param array  $options
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function request($method, $uri = null, array $options = [])
    {
        return $this->client->request($method, $uri, $options);
    }
}
