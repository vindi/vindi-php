<?php namespace Vindi;

class Bill extends ApiRequester
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
        return 'bills';
    }

    /**
     * The singularized endpoint.
     *
     * @return string
     */
    public function singularizedEndpoint()
    {
        return 'bill';
    }
}