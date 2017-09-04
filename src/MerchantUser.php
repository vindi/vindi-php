<?php

namespace Vindi;

class MerchantUser extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'merchant_users';
    }

    /**
     * Make a POST request to merchant_users/{id}/reactivate.
     *
     * @param int   $id The resource's id.
     *
     * @return mixed
     */
    public function reactivate($id)
    {
        return $this->post($id, 'reactivate');
    }
}
