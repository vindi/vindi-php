<?php

namespace Vindi\Test;

use Vindi\ProductItem;
use Vindi\ApiRequester;

class ProductItemTest extends ResourceTest
{
    public function setUp(): void
    {
        $this->resource = $this->getMockForAbstractClass(ProductItem::class);
        $this->resource->apiRequester = $this->getMockBuilder(ApiRequester::class)->getMock();
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'product_items');
    }
}
