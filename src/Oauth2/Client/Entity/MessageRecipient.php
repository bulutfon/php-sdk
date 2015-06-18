<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 23/04/15
 * Time: 13:08
 */

namespace Bulutfon\OAuth2\Client\Entity;

class MessageRecipient extends BaseEntity {
    protected $number;
    protected $state;

    public function getArrayCopy()
    {
        return [
            'number' => $this->number,
            'state' => $this->state
        ];
    }
}