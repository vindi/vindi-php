<?php

namespace Vindi;

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
     * Make a POST request to invoices/{id}/retry.
     * @param int $id The resource's id.
     *
     * @return mixed
     */
    public function retry($id)
    {
        return $this->post($id, 'retry');
    }
}
