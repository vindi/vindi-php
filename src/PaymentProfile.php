<?php

namespace Vindi;

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
}
