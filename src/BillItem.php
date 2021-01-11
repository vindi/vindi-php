<?php

namespace Vindi;

/**
 * Class BillItem
 *
 * @package Vindi
 */
class BillItem extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint(): string
    {
        return 'bill_items';
    }
}
