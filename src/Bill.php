<?php namespace Vindi;

class Bill extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'bills';
    }

    /**
     * Make a POST request to bills/{id}/approve.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     */
    public function approve($id)
    {
        return $this->post($id, 'approve');
    }
}