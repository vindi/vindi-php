<?php

namespace Vindi;

/**
 * Class PaymentProfile
 *
 * @package Vindi
 */
class PaymentProfile extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'payment_profiles';
    }

    /**
     * Make a POST request to payment_profiles/{id}/verify
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function verify($id)
    {
        return $this->post($id, 'verify');
    }
}
