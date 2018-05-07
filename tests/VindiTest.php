<?php

namespace Vindi\Test;

use Vindi\Vindi;

class VindiTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function it_should_bet_private()
    {
        try {
            $constructor = new \ReflectionClass(Vindi::class);
            $modifier = \Reflection::getModifierNames($constructor->getModifiers());
            $this->assertEquals('private',$modifier[0]);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /** @test */
    public function it_should_get_api_uri_from_environment()
    {
        putenv(Vindi::$apiUriEnvVar);
        $uri = Vindi::getApiUri();
        $this->assertEquals($uri, 'https://app.vindi.com.br/api/v1/');

        $random = rand();
        Vindi::setApiUri($random);
        $uri = Vindi::getApiUri();
        $this->assertEquals($uri, $random);

        $random = rand();
        putenv(Vindi::$apiUriEnvVar . '=' . $random);
        $uri = Vindi::getApiUri();
        $this->assertEquals($uri, $random);
    }

    /** @test */
    public function it_should_get_api_key_from_environment()
    {
        putenv(Vindi::$apiKeyEnvVar);
        $key = Vindi::getApiKey();
        $this->assertFalse($key);

        $random = rand();
        putenv(Vindi::$apiKeyEnvVar . '=' . $random);
        $key = Vindi::getApiKey();
        $this->assertEquals($key, $random);

        $random = rand();
        Vindi::setApiKey($random);
        $uri = Vindi::getApiKey();
        $this->assertEquals($uri, $random);

    }

    /** @test */
    public function it_should_get_api_time_out()
    {
        $time = Vindi::getApiTimeOut();
        $this->assertEquals($time, 60);

        $random = rand();
        putenv(Vindi::$apiTimeOutEnvVar . '=' . $random);
        $time = Vindi::getApiTimeOut();
        $this->assertEquals($time, $random);
    }

    /** @test */
    public function cert_file_should_exists()
    {
        $this->assertFileExists(Vindi::getCertPath());
    }
}
