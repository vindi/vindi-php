<?php

namespace Vindi\Test;

use Vindi\ApiRequester;
use Vindi\PaymentProfile;
use stdClass;

class PaymentProfileTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(PaymentProfile::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'payment_profiles');
    }

    /** @test */
    public function it_should_verify_a_payment_profile()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->verify(1);

        $this->assertSame($response, $stdClass);
    }
}
