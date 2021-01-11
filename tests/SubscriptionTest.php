<?php

namespace Vindi\Test;

use stdClass;
use Vindi\ApiRequester;
use Vindi\Subscription;

class SubscriptionTest extends ResourceTest
{
    public function setUp(): void
    {
        $this->resource = $this->getMockForAbstractClass(Subscription::class);
        $this->resource->apiRequester = $this->getMockBuilder(ApiRequester::class)->getMock();
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'subscriptions');
    }

    /** @test */
    public function it_should_get_the_periods_of_a_subscription()
    {
        $this->resource->apiRequester->method('request')->willReturn([]);
        $response = $this->resource->periods(1);
        $this->assertSame($response, []);
    }

    /** @test */
    public function it_should_reactivate_a_subscription()
    {
        $stdClass = new stdClass;
        $this->resource->apiRequester->method('request')->willReturn($stdClass);
        $response = $this->resource->reactivate(1);
        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_renew_a_subscription()
    {
        $stdClass = new stdClass;
        $this->resource->apiRequester->method('request')->willReturn($stdClass);
        $response = $this->resource->renew(1);
        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_return_product_items_from_a_subscription()
    {
        $stdClass = new stdClass;
        $this->resource->apiRequester->method('request')->willReturn($stdClass);
        $response = $this->resource->product_items(1);
        $this->assertSame($response, $stdClass);
    }
}
