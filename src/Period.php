<?php

namespace Vindi;

/**
 * Class Period
 *
 * @package Vindi
 */
class Period extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'periods';
    }

    /**
     * Make a POST request to periods/{id}/bill.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function bill($id)
    {
        return $this->post($id, 'bill');
    }
}
