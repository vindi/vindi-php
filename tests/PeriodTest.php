<?php namespace Vindi\Test;

use stdClass;
use Vindi\ApiRequester;
use Vindi\Period;

class PeriodTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Period::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'periods');
    }

    /** @test */
    public function it_should_bill_a_period()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->bill(1);

        $this->assertSame($response, $stdClass);
    }
}