<?php

namespace Vindi;

class Role extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'roles';
    }
}
