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
        if (ERROR_LOG) {
            var_dump($errors);
        }
        parent::__construct($status, $errors, $lastOptions);
        $message = "Erros de validação foram encontrados!";
        $firstError = reset($errors);
        if(isset($firstError->id) && $firstError->id='invalid_parameter'){
            switch ($firstError->parameter){
                case 'card_number':
                    $message = "Número de cartão de crédito inválido";
                    break;
                case 'card_expiration':
                    $message =  "Data de validade do cartão inválida";
                    break;
            }
        }

        $this->message = $message;
    }
}
