<?php

namespace Vindi\Test;

use Vindi\ApiRequester;
use Vindi\Customer;

class CustomerTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Customer::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'customers');
    }

    /** @test */
    public function it_should_unarchive_customer()
    {
        $stdClass = new \stdClass();
        $this->resource->apiRequester->method('request')->willReturn($stdClass);
        $response = $this->resource->unarchive(1);
        $this->assertSame($response, $stdClass);
    }
}
