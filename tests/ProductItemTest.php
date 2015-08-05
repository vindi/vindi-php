<?php

namespace Vindi\Test;

use Vindi\ProductItem;
use Vindi\ApiRequester;

class ProductItemTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(ProductItem::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'product_items');
    }
}
