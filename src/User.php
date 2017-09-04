<?php

namespace Vindi;

class User extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'users';
    }
}
