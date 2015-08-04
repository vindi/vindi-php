<?php namespace Vindi\Test\Http;

use Vindi\Http\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Vindi\Http\Client
     */
    private $client;

    public function setUp()
    {
        $this->client = new Client();
    }

    public function tearDown()
    {
        $this->client = null;
    }

    /** @test */
    public function it_should_call_request()
    {
        $response = $this->client->request('GET', 'http://google.com');

        $this->assertNotNull($response);
    }
}