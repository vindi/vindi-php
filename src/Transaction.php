<?php

namespace Vindi;

/**
 * Class Transaction
 *
 * @package Vindi
 */
class Transaction extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'transactions';
    }
}
