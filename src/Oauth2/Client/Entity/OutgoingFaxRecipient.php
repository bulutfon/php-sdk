<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 23/04/15
 * Time: 13:08
 */

namespace Bulutfon\OAuth2\Client\Entity;

class OutgoingFaxRecipient extends BaseEntity {
    protected $number;
    protected $state;
    protected $uuid;

    public function getArrayCopy()
    {
        return [
            'uuid' => $this->uuid,
            'number' => $this->number,
            'state' => $this->state
        ];
    }
}