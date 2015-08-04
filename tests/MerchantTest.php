<?php namespace Vindi\Test;

use Vindi\ApiRequester;
use Vindi\Merchant;

class MerchantTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Merchant::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'merchant');
    }
}