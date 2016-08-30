<?php

namespace Vindi\Test;

use Vindi\ImportBatch;
use Vindi\ApiRequester;

class ImportBatchTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(ImportBatch::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'import_batches');
    }
}
