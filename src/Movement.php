<?php

namespace Vindi;
/**
 * Class Movement
 *
 * @package Vindi
 */
class Movement extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endPoint()
    {
        return 'movements';
    }
}
