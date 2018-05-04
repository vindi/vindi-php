<?php

namespace Vindi\Test;

use stdClass;
use Vindi\ApiRequester;
use Vindi\Bill;

class BillTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Bill::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'bills');
    }

    /** @test */
    public function it_should_approve_a_bill()
    {
        $stdClass = new stdClass;
        $this->resource->apiRequester->method('request')->willReturn($stdClass);
        $response = $this->resource->approve(1);
        $this->assertSame($response, $stdClass);
    }

     /** @test */
    public function it_should_charge_a_bill()
    {
        $stdClass = new stdClass;
        $this->resource->apiRequester->method('request')->willReturn($stdClass);
        $response = $this->resource->charge(1);
        $this->assertSame($response, $stdClass);
    }

     /** @test */
    public function it_should_invoice_a_bill()
    {
        $stdClass = new stdClass;
        $this->resource->apiRequester->method('request')->willReturn($stdClass);
        $response = $this->resource->invoice(1);
        $this->assertSame($response, $stdClass);
    }


}
