<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 23/04/15
 * Time: 13:08
 */

namespace Bulutfon\OAuth2\Client\Entity;

class AutomaticCallRecipient extends BaseEntity {
    protected $number;
    protected $has_called;
    protected $gather;

    public function getArrayCopy()
    {
        return [
            'number' => $this->number,
            'has_called' => $this->has_called,
            'gather' => $this->gather
        ];
    }
}