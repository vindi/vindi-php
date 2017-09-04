<?php

namespace Vindi\Test;

use Vindi\ApiRequester;
use Vindi\MerchantUser;

class MerchantTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(MerchantUser::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'merchant_users');
    }
    
    /** @test */
    public function it_should_reactivate_a_merchant_user()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->reactivate(1);

        $this->assertSame($response, $stdClass);
    }
}
