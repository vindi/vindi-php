<?php

namespace Vindi\Test;

use Vindi\Exceptions\WebhookHandleException;
use Vindi\WebhookHandler;

class WebhookHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Vindi\WebhookHandler
     */
    protected $webhookHandler;

    public function setUp()
    {
        $this->webhookHandler = new WebhookHandler;
    }

    public function tearDown()
    {
        $this->webhookHandler = null;
    }

    /** @test */
    public function it_should_get_file_body()
    {
        $this->webhookHandler->file = dirname(__FILE__) . '/data/webhook-test.txt';

        $data = $this->webhookHandler->getRawBody();

        $this->assertSame('{"event":{"type":"random test"}}', $data);
    }

    /** @test */
    public function it_should_parse_a_valid_webhook()
    {
        $this->webhookHandler->file = dirname(__FILE__) . '/data/webhook-test.txt';

        $data = $this->webhookHandler->handle();

        $this->assertEquals((object) ['type' => 'random test'], $data);
    }

    /** @test */
    public function it_should_refuse_an_empty_webhook()
    {
        $this->setExpectedException(WebhookHandleException::class, 'Empty post body!');
        $this->webhookHandler->handle();
    }

    /** @test */
    public function it_should_refuse_an_invalid_webhook()
    {
        $this->webhookHandler->file = dirname(__FILE__) . '/data/webhook-invalid.txt';

        $this->setExpectedException(WebhookHandleException::class, 'Unable to decode JSON from post body!');
        $this->webhookHandler->handle();
    }
}
