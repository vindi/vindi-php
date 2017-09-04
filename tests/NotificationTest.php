<?php

namespace Vindi\Test;

use Vindi\ApiRequester;
use Vindi\Notification;
use stdClass;

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
        $this->assertSame($this->resource->endpoint(), 'notification');
    }

    /** @test */
    public function it_should_get_notification_item_a_notification()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->getNotificationItem(1);

        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_set_notification_item_a_notification()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->setNotificationItem(1);

        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_remove_notification_item_a_notification()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->removeNotificationItem(1);

        $this->assertSame($response, $stdClass);
    }
}
