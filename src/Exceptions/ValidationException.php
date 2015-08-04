<?php namespace Vindi\Exceptions;

class ValidationException extends RequestException
{
    /**
     * ValidationException constructor.
     *
     * @param int   $status
     * @param mixed $errors
     */
    public function __construct($status, $errors)
    {
        parent::__construct($status, $errors);

        $this->message = "Erros de validação foram encontrados!";
    }
}