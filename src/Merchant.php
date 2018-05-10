<?php

namespace Vindi;

/**
 * Class Merchant
 *
 * @package Vindi
 */
class Merchant extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'merchant';
    }
}
