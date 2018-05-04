<?php

namespace Vindi;

class Charge extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'charges';
    }

    /**
     * Make a POST request to charges/{id}/reissue.
     *
     * @param int   $id The resource's id.
     * @param array $form_params
     *
     * @return mixed
     */
    public function reissue($id, array $form_params = [])
    {
        return $this->post($id, 'reissue', $form_params);
    }

    /**
     * Make a POST request to charges/{id}/charge.
     *
     * @param int   $id The resource's id.
     * @param array $form_params
     *
     * @return mixed
     */
    public function charge($id, array $form_params = [])
    {
        return $this->post($id, 'charge', $form_params);
    }

    /**
     * Make a POST request to charges/{id}/refund.
     *
     * @param int   $id The resource's id.
     *
     * @return mixed
     */
    public function refund($id)
    {
        return $this->post($id, 'refund');
    }

    /**
     * Make a POST request to charges/{id}/fraud_review.
     *
     * @param int   $id The resource's id.
     *
     * @return mixed
     */
    public function fraud_review($id)
    {
        return $this->post($id, 'fraud_review');
    }
}
