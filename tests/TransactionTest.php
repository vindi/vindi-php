<?php

namespace Vindi\Test;

use Vindi\Transaction;
use Vindi\ApiRequester;

class TransactionTest extends ResourceTest
{
    public function setUp()
    {
        $this->resource = $this->getMockForAbstractClass(Transaction::class);
        $this->resource->apiRequester = $this->getMock(ApiRequester::class);
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'transactions');
    }
}
