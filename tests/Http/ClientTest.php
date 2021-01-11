<?php namespace Vindi\Test\Http;

use Vindi\Http\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @var \Vindi\Http\Client
     */
    private $client;

    public function setUp(): void
    {
        $this->client = new Client();
    }

    public function tearDown(): void
    {
        $this->client = null;
    }

    /** @test */
    public function it_should_call_request()
    {
        $response = $this->client->request('GET', 'http://google.com');

        $this->assertNotNull($response);
    }

    /** @test */
    public function it_should_have_correct_headers()
    {
        $version = \Vindi\Vindi::$sdkVersion;
        $headers = $this->client->getConfig()['headers'];

        $this->assertEquals($headers['Content-Type'], 'application/json');
        $this->assertEquals(preg_split('/\;/', $headers['User-Agent'])[0], "Vindi-PHP/{$version}");
    }
}
