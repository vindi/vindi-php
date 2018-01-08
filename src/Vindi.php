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
     * The Environment variable name for API Key.
     * @var string
     */
    public static $apiKeyEnvVar = 'VINDI_API_KEY';
    
    /**
     * Status of your application vindi
     * @var string
     */
    public static $appEnv = 'VINDI_APP_ENV';

    /**
     * Get Vindi API Key from environment.
     * @return string
     */
    public function getApiKey()
    {
        return getenv(static::$apiKeyEnvVar);
    }

    public function isSandbox()
    {
        return getenv(static::$appEnv);
    }

    /**
     * Get CA Bundle Path.
     * @return string
     */
    public function getCertPath()
    {
        return realpath(sprintf('%s/%s', dirname(__FILE__), '/../data/ssl/ca-bundle.crt'));
    }

    /**
     * Get url base with reference of application
     *
     * @return string
     */
    public function getApiBase()
    {
        if ($this->isSandbox()) return 'https://sandbox-app.vindi.com.br/api/v1/';
        return 'https://app.vindi.com.br/api/v1/';
    }
}
