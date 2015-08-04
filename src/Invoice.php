<?php namespace Vindi;

class Invoice extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'invoices';
    }

}