<?php

namespace Vindi\Http;

use GuzzleHttp\Client as Guzzle;
use Vindi\Vindi;

/**
 * Class Client
 *
 * @package Vindi\Http
 */
class Client extends Guzzle
{
    /**
     * Client constructor.
     */
    public function __construct(array $config = [])
    {
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';

        $config = array_merge([
            'base_uri' => Vindi::getApiUri(),
            'auth' => [Vindi::getApiKey(), '', 'BASIC'],
            'headers' => [
                'Content-Type' => 'application/json',
                'User-Agent' => trim('Vindi-PHP/' . Vindi::$sdkVersion . "; {$host}"),
            ],
            'verify' => Vindi::getCertPath(),
            'timeout' => Vindi::getApiTimeOut(),
            'curl.options' => [
                'CURLOPT_SSLVERSION' => 'CURL_SSLVERSION_TLSv1_2',
            ]
        ], $config);


        parent::__construct($config);
    }
}
