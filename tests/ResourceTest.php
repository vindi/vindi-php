<?php

namespace Vindi\Test;

use stdClass;
use Vindi\ApiRequester;
use Vindi\Resource;

class ResourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $resource;

    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Resource::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    public function tearDown()
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
}
