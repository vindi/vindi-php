<?php

namespace Vindi\Test;

use Vindi\ApiRequester;
use Vindi\Notification;

class NotificationTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Notification::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'notifications');
    }

}
