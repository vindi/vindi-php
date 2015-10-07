<?php

namespace Vindi;

class Vindi
{
    /**
     * This Package SDK Version.
     * @var string
     */
    public static $sdkVersion = '1.0.4';

    /**
     * The base URL for the Vindi API.
     * @var string
     */
    public static $apiBase = 'https://app.vindi.com.br/api/v1/';

    /**
     * The Environment variable name for API Key.
     * @var string
     */
    public static $apiKeyEnvVar = 'VINDI_API_KEY';

    /**
     * Get Vindi API Key from environment.
     * @return string
     */
    public function getApiKey()
    {
        return getenv(static::$apiKeyEnvVar);
    }

    /**
     * Get CA Bundle Path.
     * @return string
     */
    public function getCertPath()
    {
        return realpath(sprintf('%s/%s', dirname(__FILE__), '/../ssl/ca-bundle.crt'));
    }
}
