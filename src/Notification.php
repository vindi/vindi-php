<?php

namespace Vindi;

class Notification extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'notifications';
    }
}
