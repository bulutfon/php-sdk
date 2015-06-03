<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 23/04/15
 * Time: 13:08
 */

namespace Bulutfon\OAuth2\Client\Entity;

class IncomingFax extends BaseEntity {
    protected $uuid;
    protected $sender;
    protected $receiver;
    protected $created_at;

    public function getArrayCopy()
    {
        return [
            'id' => $this->uuid,
            'number' => $this->sender,
            'state' => $this->receiver,
            'destination_type' => $this->created_at
        ];
    }
}