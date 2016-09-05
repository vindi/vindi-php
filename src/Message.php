<?php

namespace Vindi;

class Message extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endPoint()
    {
        return 'messages';
    }
}
