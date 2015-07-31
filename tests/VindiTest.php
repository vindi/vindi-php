<?php

namespace Vindi\Test;

use Vindi\Vindi;

class VindiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Vindi\Vindi;
     */
    private $vindi;

    public function setUp()
    {
        $this->vindi = new Vindi;
    }

    public function tearDown()
    {
        $this->vindi = null;
    }

    /** @test */
    public function it_should_be_instantiated()
    {
        $this->assertNotNull($this->vindi);
        $this->assertInstanceOf(Vindi::class, $this->vindi);
    }

    /** @test */
    public function it_should_get_api_key_from_environment()
    {
        putenv(Vindi::$apiKeyEnvVar);
        $key = $this->vindi->getApiKey();
        $this->assertFalse($key);

        $random = rand();
        putenv(Vindi::$apiKeyEnvVar . '=' . $random);
        $key = $this->vindi->getApiKey();
        $this->assertEquals($key, $random);
    }
}
