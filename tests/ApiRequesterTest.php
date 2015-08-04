<?php

namespace Vindi\Test;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Vindi\Exceptions\RateLimitException;
use Vindi\Exceptions\RequestException;
use Vindi\Exceptions\ValidationException;
use Vindi\Http\Client;
use Vindi\ApiRequester;

class ApiRequesterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Vindi\ApiRequester;
     */
    private $apiRequester;

    /**
     * @var string
     */
    private $jsonError = '{"errors": [{"id": "id", "parameter": "parameter", "message": "message"}]}';

    public function setUp()
    {
        $this->apiRequester = new ApiRequester;
        $this->apiRequester->client = $this->getMock(Client::class);
    }

    public function tearDown()
    {
        $this->apiRequester = null;
    }

    /** @test */
    public function it_should_make_a_request()
    {
        $response = new Response(200, [], '{"test": "ok"}');
        $this->apiRequester->client->method('request')->willReturn($response);

        $response = $this->apiRequester->request('GET', 'test');

        $this->assertSame($response, 'ok');
    }

    /** @test */
    public function it_should_throw_a_request_error()
    {
        $this->setExpectedException(RequestException::class);
        $response = new Response(401, [], $this->jsonError);
        $this->apiRequester->client->method('request')->willReturn($response);

        $this->apiRequester->request('GET', 'test');
    }

    /** @test */
    public function it_should_throw_a_validation_error()
    {
        $this->setExpectedException(ValidationException::class);
        $response = new Response(422, [], $this->jsonError);
        $this->apiRequester->client->method('request')->willReturn($response);

        $this->apiRequester->request('GET', 'test');
    }

    /** @test */
    public function it_should_throw_a_rate_limit_exception()
    {
        $this->setExpectedException(RateLimitException::class);
        $response = new Response(429, ['Rate-Limit-Remaining' => 0], $this->jsonError);
        $this->apiRequester->client->method('request')->willReturn($response);

        $this->apiRequester->request('GET', 'test');
    }

    /** @test */
    public function it_should_catch_a_client_exception()
    {
        $this->setExpectedException(RequestException::class);

        $request = new Request('GET', 'test');
        $response = new Response(500, [], $this->jsonError);
        $clientException = new ClientException('', $request, $response);

        $this->apiRequester->client->method('request')->willThrowException($clientException);

        $this->apiRequester->request('GET', 'test');
    }
}
