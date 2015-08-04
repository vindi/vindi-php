<?php namespace Vindi\Test;

use stdClass;
use Vindi\ApiRequester;
use Vindi\Subscription;

class SubscriptionTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Subscription::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
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
}