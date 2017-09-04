<?php

namespace Vindi;

class Movement extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'movements';
    }
}
