<?php

namespace Vindi;

class Bill extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'bills';
    }

    /**
     * Make a POST request to bills/{id}/approve.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     * @throws Exceptions\RateLimitException
     * @throws Exceptions\RequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function approve($id)
    {
        return $this->post($id, 'approve');
    }

    /**
     * Make a POST request to bills/{id}/charge.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     * @throws Exceptions\RateLimitException
     * @throws Exceptions\RequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function charge($id)
    {
        return $this->post($id, 'charge');
    }

    /**
     * Make a POST request to bills/{id}/invoice.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     * @throws Exceptions\RateLimitException
     * @throws Exceptions\RequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function invoice($id)
    {
        return $this->post($id, 'invoice');
    }
}
