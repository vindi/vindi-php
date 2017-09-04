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
        return 'notification';
    }

    /**
     * Make a GET request to notifications/{id}/notification_items.
     * @param int $id The resource's id.
     *
     * @return string
     */
    public function getNotificationItem($id, $page = 1, $per_page = 50)
    {
        return $this->get($id, 'notification_items', $page, $per_page);
    }

    /**
     * Make a POST request to notifications/{id}/notification_items.
     *
     * @param int   $id The resource's id.
     * @param array.
     *
     * @return mixed
     */
    public function setNotificationItem($id, array $form_params = [])
    {
        return $this->post($id, 'notification_items', $form_params);
    }

    /**
     * Make a DELETE request to notifications/{id}/notification_items.
     *
     * @param int   $id The resource's id.
     * @param int 	$item_id The resource's item id.
     *
     * @return mixed
     */
    public function removeNotificationItem($id, $item_Id)
    {
        return $this->delete($id, 'notification_items', $item_id);
    }
}
