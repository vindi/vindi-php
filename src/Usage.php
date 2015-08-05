<?php

namespace Vindi;

class Usage extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'usages';
    }
}
