<?php

namespace Vindi;

class Vindi
{
    /**
     * This Package SDK Version.
     * @var string
     */
    public static $sdkVersion = '1.0.3';

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
     * Test mode variable - not safe
     * You SHOULD NOT use active testMode in production environment
     * @var bool
     */
    private static $testMode = false;

    /**
     * Get Vindi API Key from environment.
     * @return string
     */
    public function getApiKey()
    {
        return getenv(static::$apiKeyEnvVar);
    }

    /**
     * Set test mode
     * You SHOULD NOT use active testMode in production environment
     * @param bool $testMode
     */
    public static function setUnsafeTestMode($testMode = false)
    {
        self::$testMode = $testMode;
    }

    /**
     * Verify if safe mode is active
     */
    public static function isSafeMode()
    {
        return self::$testMode == false;
    }
}
