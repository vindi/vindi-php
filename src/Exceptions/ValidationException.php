<?php namespace Vindi\Exceptions;

/**
 * Class ValidationException
 *
 * @package Vindi\Exceptions
 */
class ValidationException extends RequestException
{
    /**
     * ValidationException constructor.
     *
     * @param int   $status
     * @param mixed $errors
     */
    public function __construct($status, $errors, array $lastOptions = [])
    {
        parent::__construct($status, $errors, $lastOptions);

        $this->message     = "Erros de validação foram encontrados!";
    }
}
