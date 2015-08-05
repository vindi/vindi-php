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
}
