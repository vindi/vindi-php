<?php

namespace Vindi\Test;

use Vindi\Message;
use Vindi\ApiRequester;

class MessageTest extends ResourceTest
{
    public function setUp(): void
    {
        $this->resource = $this->getMockForAbstractClass(Message::class);
        $this->resource->apiRequester = $this->getMockBuilder(ApiRequester::class)->getMock();
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'messages');
    }
}
