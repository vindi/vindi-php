<?php

namespace Vindi\Test;

use Vindi\ApiRequester;
use Vindi\PaymentMethod;

class PaymentMethodTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(PaymentMethod::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'payment_methods');
    }
}
