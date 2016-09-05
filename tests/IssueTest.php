<?php

namespace Vindi\Test;

use Vindi\Issue;
use Vindi\ApiRequester;

class issueTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Issue::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'issues');
    }
}
