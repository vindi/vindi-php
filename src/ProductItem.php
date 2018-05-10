<?php

namespace Vindi;

/**
 * Class ProductItem
 *
 * @package Vindi
 */
class ProductItem extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'product_items';
    }
}
