<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 23/04/15
 * Time: 13:08
 */

namespace Bulutfon\OAuth2\Client\Entity;

class MessageTitle extends BaseEntity {
    protected $id;
    protected $name;
    protected $state;

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'number' => $this->name,
            'state' => $this->state
        ];
    }
}