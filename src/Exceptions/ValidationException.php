<?php namespace Vindi\Exceptions;

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
        $this->message = "Erros de validação foram encontrados!";
        parent::__construct($status, $errors, $lastOptions);

    }
}
