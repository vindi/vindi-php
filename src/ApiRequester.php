<?php namespace Vindi;

use Vindi\Http\Client;

abstract class ApiRequester
{
    /**
     * @var \Vindi\Http\Client
     */
    public $client;

    /**
     * The endpoint at default state that will hit the API.
     *
     * @return string
     */
    public abstract function endpoint();

    /**
     * The pluralized endpoint.
     *
     * @return string
     */
    public abstract function pluralizedEndpoint();

    /**
     * The singularized endpoint.
     *
     * @return string
     */
    public abstract function singularizedEndpoint();

    /**
     * ApiRequester constructor.
     */
    public function __construct()
    {
        $this->client = new Client;
    }

    /**
     * @param string $method   HTTP Method.
     * @param string $endpoint Relative to API base path.
     * @param array  $options  Options for the request.
     *
     * @return mixed
     */
    public function request($method, $endpoint, array $options = [])
    {
        $response = $this->client->request($method, $endpoint, $options);

        $content = $response->getBody()->getContents();

        return json_decode($content);
    }

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
        $response = $this->request('GET', $this->url(), ['query' => $params]);

        return $response->{$this->pluralizedEndpoint()};
    }

    /**
     * Create a new resource.
     *
     * @param array $form_params The request body.
     *
     * @return mixed
     */
    public function create(array $form_params)
    {
        $response = $this->request('POST', $this->url(), compact('form_params'));

        return $response->{$this->singularizedEndpoint()};
    }

    /**
     * Retrieve a specific resource.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     */
    public function retrieve($id)
    {
        $response = $this->request('GET', $this->url($id));

        return $response->{$this->singularizedEndpoint()};
    }

    /**
     * Update a specific resource.
     *
     * @param int   $id          The resource's id.
     * @param array $form_params The request body.
     *
     * @return mixed
     */
    public function update($id, array $form_params)
    {
        $response = $this->request('PUT', $this->url($id), compact('form_params'));

        return $response->{$this->singularizedEndpoint()};
    }

    /**
     * Delete a specific resource.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     */
    public function delete($id)
    {
        $response = $this->request('DELETE', $this->url($id));

        return $response->{$this->singularizedEndpoint()};
    }

    /**
     * Make a GET request to an additional endpoint for a specific resource.
     *
     * @param int    $id                 The resource's id.
     * @param string $additionalEndpoint Additional endpoint that will be appended to the URL.
     *
     * @return mixed
     */
    public function get($id, $additionalEndpoint)
    {
        $response = $this->request('GET', $this->url($id, $additionalEndpoint));

        return $response->$additionalEndpoint;
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
    public function post($id, $additionalEndpoint, array $form_params = [])
    {
        $response = $this->request('POST', $this->url($id, $additionalEndpoint), compact('form_params'));

        return $response->{$this->singularizedEndpoint()};
    }
}