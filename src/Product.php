<?php

namespace Vindi;

/**
 * Class Product
 *
 * @package Vindi
 */
class Product extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'products';
    }
}
