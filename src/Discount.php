<?php namespace Vindi;

class Discount extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'discounts';
    }
}