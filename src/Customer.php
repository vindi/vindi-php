<?php

namespace Vindi;

/**
 * Class Customer
 *
 * @package Vindi
 */
class Customer extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'customers';
    }

    /**
     * Make a POST request to customers/{id}/unarchive.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function unarchive($id)
    {
        return $this->post($id, 'unarchive');
    }
}
