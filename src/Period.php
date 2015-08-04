<?php namespace Vindi;

class Period extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'periods';
    }

    /**
     * Make a POST request to periods/{id}/bill.
     *
     * @param int $id The resource's id.
     *
     * @return mixed
     */
    public function bill($id)
    {
        return $this->post($id, 'bill');
    }
}