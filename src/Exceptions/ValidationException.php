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
        parent::__construct($status, $errors, $lastOptions);
        
        if(env('VINDI_EXCEPTION_DETAILS')){
            $msg = $msg . json_encode($errors);
        }

        $this->message = $msg;
    }
}
