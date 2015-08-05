<?php

namespace Vindi;

class Customer extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'customers';
    }
}
