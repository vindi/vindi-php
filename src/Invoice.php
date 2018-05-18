<?php

namespace Vindi;

/**
 * Class Invoice
 *
 * @package Vindi
 */
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

    /**
     *  Make a POST request to invoices/{id}/retry
     *
     * @param  int $id The resource's id.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function retry($id)
    {
        return $this->post($id, 'retry');
    }
}
