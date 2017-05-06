<?php namespace Vindi\Exceptions;

class ValidationException extends RequestException
{
    /**
     * ValidationException constructor.
     *
     * @param int $status
     * @param mixed $errors
     * @param array $lastOptions
     */
    public function __construct($status, $errors, array $lastOptions = [])
    {
        parent::__construct($status, $errors, $lastOptions);

        $this->message = env('VINDI_EXCEPTION_AS_JSON', false) ? $this->handleJson($errors) : $this->handleString($errors);
    }

    /**
     * Handle errors response as json
     *
     * @param $errors
     * @return string
     */
    public function handleJson($errors)
    {
        $error_log = [];

        if (is_string($errors))
            return $errors;

        foreach ($errors as $error)
            $error_log[$error->parameter] = $error->message;

        return json_encode($error_log);
    }

    /**
     * Handle errors response as string
     *
     * @param $errors
     * @return string
     */
    public function handleString($errors)
    {
        $error_log = '';

        if (is_string($errors))
            return $errors;

        foreach ($errors as $error)
            $error_log .= "\n[{$error->parameter}] {$error->message}";

        return "Os seguintes erros de validação foram encontrados:" . $error_log;
    }
}
