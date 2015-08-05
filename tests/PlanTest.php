<?php

namespace Vindi\Test;

use Vindi\Plan;
use Vindi\ApiRequester;

class PlanTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Plan::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'plans');
    }
}
