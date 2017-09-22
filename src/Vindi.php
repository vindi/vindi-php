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
    public static $apiBase = 'https://app.vindi.com.br/api/v1/';

    /**
     * The base URL for the Vindi API sandbox.
     * @var string
     */
    public static $sandboxApiBase = 'https://sandbox-app.vindi.com.br/api/v1/';

    /**
     * The Environment variable name for the current stage.
     * @var string
     */
    public static $stageEnvVar = 'VINDI_ENV';

    /**
     * The Environment variable name for API Key.
     * @var string
     */
    public static $apiKeyEnvVar = 'VINDI_API_KEY';

    /**
     * Get Vindi current stage from environment.
     * @return string
     */
    public function getStage()
    {
        return getenv(static::$stageEnvVar);
    }

    /**
     * Get Vindi API Key from environment.
     * @return string
     */
    public function getApiKey()
    {
        return getenv(static::$apiKeyEnvVar);
    }

    /**
     * Get Vindi API base URI.
     */
    public function getBaseUri()
    {
        return $this->getApiKey() === 'sandbox'
            ? static::$sandboxApiBase
            : static::$apiBase;
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
