<?php

namespace Vindi\Test;

use Vindi\ApiRequester;
use Vindi\Invoice;

class InvoiceTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Invoice::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'invoices');
    }

    /** @test */
    public function it_should_retry_a_invoice()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->retry(1);

        $this->assertSame($response, $stdClass);
    }
}
