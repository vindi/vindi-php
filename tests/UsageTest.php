<?php

namespace Vindi\Test;

use Vindi\Usage;
use Vindi\ApiRequester;

class UsageTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Usage::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'usages');
    }
}
