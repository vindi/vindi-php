<?php

namespace Vindi;

abstract class Resource
{
    /**
     * @var \Vindi\ApiRequester
     */
    public $apiRequester;

    /**
     * Resource constructor.
     */
    public function __construct()
    {
        $this->apiRequester = new ApiRequester;
    }

    /**
     * The endpoint at default state that will hit the API.
     *
     * @return string
     */
    abstract public function endpoint();

    /**
     * Build url that will hit the API.
     *
     * @param int    $id                 The resource's id.
     * @param string $additionalEndpoint Additional endpoint that will be appended to the URL.
     *
     * @return string
     */
    public function url($id = null, $additionalEndpoint = null)
    {
        $endpoint = $this->endpoint();

        if (! is_null($id)) {
            $endpoint .= '/' . $id;
        }
        if (! is_null($additionalEndpoint)) {
            $endpoint .= '/' . $additionalEndpoint;
        }

        return $endpoint;
    }

    /**
     * Retrieve all resources.
     *
     * @param array $params Pagination and Filter parameters.
     *
     * @return mixed
     */
    public function all(array $params = [])
    {
        return $this->apiRequester->request('GET', $this->url(), ['query' => $params]);
    }

    /**
     * Create a new resource.
     *
     * @param array $form_params The request body.
     *
     * @return mixed
     */
    public function create(array $form_params = [])
    {
        return $this->apiRequester->request('POST', $this->url(), ['json' => $form_params]);
    }

    /**
     * Retrieve a specific resource.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     */
    public function retrieve($id = null)
    {
        return $this->apiRequester->request('GET', $this->url($id));
    }

    /**
     * Update a specific resource.
     *
     * @param int   $id          The resource's id.
     * @param array $form_params The request body.
     *
     * @return mixed
     */
    public function update($id = null, array $form_params = [])
    {
        return $this->apiRequester->request('PUT', $this->url($id), ['json' => $form_params]);
    }

    /**
     * Delete a specific resource.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        return $this->apiRequester->request('DELETE', $this->url($id));
    }

    /**
     * Make a GET request to an additional endpoint for a specific resource.
     *
     * @param int    $id                 The resource's id.
     * @param string $additionalEndpoint Additional endpoint that will be appended to the URL.
     *
     * @return mixed
     */
    public function get($id = null, $additionalEndpoint = null)
    {
        return $this->apiRequester->request('GET', $this->url($id, $additionalEndpoint));
    }

    /**
     * Make a POST request to an additional endpoint for a specific resource.
     *
     * @param int    $id                 The resource's id.
     * @param string $additionalEndpoint Additional endpoint that will be appended to the URL.
     * @param array  $form_params        The request body.
     *
     * @return mixed
     */
    public function post($id = null, $additionalEndpoint = null, array $form_params = [])
    {
        return $this->apiRequester->request('POST', $this->url($id, $additionalEndpoint), ['json' => $form_params]);
    }

    /**
     * Return the last response from a preview request
     *
     * @return mixed
     */
    public function getLastResponse(){
       return $this->apiRequester->lastResponse;
    }
}
