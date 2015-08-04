<?php namespace Vindi;

class Plan extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'plans';
    }
}