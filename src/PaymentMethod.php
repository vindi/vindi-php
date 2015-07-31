<?php namespace Vindi;

class PaymentMethod extends ApiRequester
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return $this->pluralizedEndpoint();
    }

    /**
     * The pluralized endpoint.
     *
     * @return string
     */
    public function pluralizedEndpoint()
    {
        return 'payment_methods';
    }

    /**
     * The singularized endpoint.
     *
     * @return string
     */
    public function singularizedEndpoint()
    {
        return 'payment_method';
    }
}