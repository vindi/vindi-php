<?php  namespace Vindi;

class Usage extends ApiRequester
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
        return 'usages';
    }

    /**
     * The singularized endpoint.
     *
     * @return string
     */
    public function singularizedEndpoint()
    {
        return 'usage';
    }
}