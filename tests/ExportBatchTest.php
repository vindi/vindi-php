<?php

namespace Vindi\Test;

use Vindi\ExportBatch;
use Vindi\ApiRequester;

class ExportBatchTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(ExportBatch::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'export_batches');
    }

    /** @test */
    public function it_should_approve_an_export_batch()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->approve(1);

        $this->assertSame($response, $stdClass);
    }
}

