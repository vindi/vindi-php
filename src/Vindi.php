<?php

namespace Vindi;

class Vindi
{
    /**
     * This Package SDK Version.
     * @var string
     */
    public static $sdkVersion = '1.0.10';

    /**
     * The base URL for the Vindi API.
     * @var string
     */
    public static $apiBase = 'https://sandbox-app.vindi.com.br/api/v1/';

    /**
     * The Environment variable name for API Key.
     * @var string
     */
    public static $apiKeyEnvVar = 'VINDI_API_KEY';
    public static $baseApiEnvVar = 'VINDI_API_BASE';

    /**
     * Get Vindi API Key from environment.
     * @return string
     */
    public function getApiKey()
    {
        return getenv(static::$apiKeyEnvVar);
    }
    public static function getApiBase()
    {
        return getenv(static::$baseApiEnvVar);
    }
    /**
     * Get CA Bundle Path.
     * @return string
     */
    public function getCertPath()
    {
        return realpath(sprintf('%s/%s', dirname(__FILE__), '/../data/ssl/ca-bundle.crt'));
    }
}
