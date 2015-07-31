<?php  namespace Vindi;

class Discount extends ApiRequester
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
        return 'discounts';
    }

    /**
     * The singularized endpoint.
     *
     * @return string
     */
    public function singularizedEndpoint()
    {
        return 'discount';
    }
}