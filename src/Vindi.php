<?php

namespace Vindi;

/**
 * Class Vindi
 *
 * @package Vindi
 */
class Vindi
{
    /**
     * The Environment variable name or argument for API URI.
     *
     * @var string
     */
    const VINDI_API_URI = 'VINDI_API_URI';

    /**
     * The Environment variable name or argument for API Key.
     *
     * @var string
     */
    const VINDI_API_KEY = 'VINDI_API_KEY';

    /**
     * API KEY to be set on instances
     *
     * @var string
     */
    private static $vindi_api_key;

    /**
     * URI to be set on instances
     * Ex.: https://sandbox-app.vindi.com.br/api/v1/
     *
     * @var string;
     */
    private static $vindi_api_uri;

    /**
     * This Package SDK Version.
     *
     * @var string
     */
    public static $sdkVersion = '1.2.0';

    /**
     * The Environment variable name for API Time Out.
     *
     * @var string
     */
    public static $apiTimeOutEnvVar = 'VINDI_API_TIME_OUT';

    /**
     * Vindi constructor.
     */
    private function __construct()
    {
    }

    /**
     * Set API KEY
     *
     * @param $vindi_api_key
     */
    public static function setApiKey($vindi_api_key)
    {
        if (null === self::$vindi_api_key) {
            self::$vindi_api_key = $vindi_api_key;
        }
    }

    /**
     * Set API URI
     *
     * @param $vindi_api_uri
     */
    public static function setApiUri($vindi_api_uri)
    {
        if (null === self::$vindi_api_uri) {
            self::$vindi_api_uri = $vindi_api_uri;
        }
    }

    /**
     * Get Vindi API URI from environment.
     *
     * @return string
     */
    public static function getApiUri()
    {
        if (null !== self::$vindi_api_uri) {
            return self::$vindi_api_uri;
        }

        if (!empty(getenv(static::VINDI_API_URI))) {
            return getenv(static::VINDI_API_URI);
        }

        return 'https://app.vindi.com.br/api/v1/';
    }

    /**
     * Get Vindi API Key from environment.
     *
     * @return string
     */
    public static function getApiKey()
    {
        if (null !== self::$vindi_api_key) {
            return self::$vindi_api_key;
        }

        return getenv(static::VINDI_API_KEY);
    }

    /**
     * Get Vindi API Time Out from environment.
     *
     * @return string
     */
    public static function getApiTimeOut()
    {
        if (empty(getenv(static::$apiTimeOutEnvVar))) {
            return 60;
        }
        return getenv(static::$apiTimeOutEnvVar);
    }

    /**
     * Get CA Bundle Path.
     *
     * @return string
     */
    public static function getCertPath()
    {
        return realpath(sprintf('%s/%s', dirname(__FILE__), '/../data/ssl/ca-bundle.crt'));
    }
}
