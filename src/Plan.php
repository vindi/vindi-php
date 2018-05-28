<?php

namespace Vindi;

/**
 * Class Plan
 *
 * @package Vindi
 */
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
