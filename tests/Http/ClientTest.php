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
    public function it_should_instantiate_client()
    {
        $this->assertNotNull($this->client);
        $this->assertInstanceOf(Client::class, $this->client);
    }

    /** @test */
    public function it_should_call_request()
    {
        $response = $this->client->request('GET', 'http://127.0.0.1');

        $this->assertNotNull($response);
    }
}