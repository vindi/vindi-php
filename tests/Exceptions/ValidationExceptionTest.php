<?php

namespace Vindi\Test\Exceptions;

use Vindi\Exceptions\ValidationException;

class ValidationExceptionTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_access_exception_getters()
    {
        $status = 400;
        $errors = [
            (object) [
                'id'        => 'id 1',
                'parameter' => 'parameter 1',
                'message'   => 'message 1',
            ],
            (object) [
                'id'        => 'id 2',
                'parameter' => 'parameter 2',
                'message'   => 'message 2',
            ],
        ];
        $exception = new ValidationException($status, $errors);

        $this->assertSame($status, $exception->getCode());
        $this->assertSame($errors, $exception->getErrors());
        $this->assertSame(['id 1', 'id 2'], $exception->getIds());
        $this->assertSame(['parameter 1', 'parameter 2'], $exception->getParameters());
        $this->assertSame(['message 1', 'message 2'], $exception->getMessages());
    }
}
