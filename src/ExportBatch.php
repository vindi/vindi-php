<?php

namespace Vindi;

/**
 * Class ExportBatch
 *
 * @package Vindi
 */
class ExportBatch extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'export_batches';
    }

    /**
     *  Make a POST request to export_batches/{id}/approve
     *
     * @param  int $id The resource's id.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function approve($id)
    {
        return $this->post($id, 'approve');
    }
}
