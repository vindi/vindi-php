<?php

namespace Vindi;

/**
 * Class Issue
 *
 * @package Vindi
 */
class Issue extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'issues';
    }
}
