<?php

namespace Vindi\Test;

use stdClass;
use Vindi\ApiRequester;
use Vindi\Resource;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ResourceTest extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $resource;

    public function setUp(): void
    {
        $this->resource = $this->getMockForAbstractClass(Resource::class);
        $this->resource->apiRequester = $this->getMockBuilder(ApiRequester::class)->getMock();
    }

    public function tearDown(): void
    {
        $this->resource = null;
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->expectOutputString($this->resource->endpoint());
    }

    /** @test */
    public function it_should_retrieve_all_resources()
    {
        $this->resource->apiRequester->method('request')->willReturn([]);

        $response = $this->resource->all();

        $this->assertSame($response, []);
    }

    /** @test */
    public function it_should_retrieve_one_resource()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->retrieve(1);

        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_create_a_resource()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->create([]);

        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_update_a_resource()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->update(1, []);

        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_delete_a_resource()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->delete(1);

        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_use_a_custom_get_to_resource()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->get(1, 'test');

        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_use_a_custom_post_to_resource()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->post(1, 'test', []);

        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_return_null_when_no_request_was_sent()
    {
        $lastResponse = $this->resource->getLastResponse();

        $this->assertSame($lastResponse, NULL);
    }

    /** @test */
    public function it_should_return_last_request_from_a_resource()
    {
        $response = new Response(200, [], '{"test": "ok"}');
        $this->resource->apiRequester->method('request')->willReturn($response);
        $this->resource->apiRequester->lastResponse = $response;

        $response = $this->resource->apiRequester->request('GET', 'test');
        $lastResponse = $this->resource->getLastResponse();

        $this->assertSame($response, $lastResponse);
    }
}
