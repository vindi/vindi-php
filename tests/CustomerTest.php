<?php

namespace Vindi\Test;

use stdClass;
use Vindi\ApiRequester;
use Vindi\Customer;

class CustomerTest extends ResourceTest
{
    public function setUp(): void
    {
        $this->resource = $this->getMockForAbstractClass(Customer::class);
        $this->resource->apiRequester = $this->getMockBuilder(ApiRequester::class)->getMock();
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'customers');
    }

    /** @test */
    public function it_should_unarchive_a_customer()
    {
        $stdClass = new stdClass;
        $this->resource->apiRequester->method('request')->willReturn($stdClass);
        $response = $this->resource->unarchive(1);
        $this->assertSame($response, $stdClass);
    }
}
