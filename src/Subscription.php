<?php

namespace Vindi;

/**
 * Class Subscription
 *
 * @package Vindi
 */
class Subscription extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'subscriptions';
    }

    /**
     * Make a GET request to subscriptions/{id}/periods.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function periods($id)
    {
        return $this->get($id, 'periods');
    }

    /**
     * Make a POST request to subscriptions/{id}/reactivate.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function reactivate($id)
    {
        return $this->post($id, 'reactivate');
    }

    /**
     * Make a POST request to subscriptions/{id}/renew.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function renew($id)
    {
        return $this->post($id, 'renew');
    }
}
