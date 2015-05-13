<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 23/04/15
 * Time: 13:08
 */

namespace Bulutfon\OAuth2\Client\Entity;

class OutgoingFax extends BaseEntity {
    protected $id;
    protected $title;
    protected $did;
    protected $recipient_count;
    protected $recipients;
    protected $created_at;

    public function getArrayCopy()
    {
        return [
            'id' => $this->$id,
            'title' => $this->$title,
            'did' => $this->$did,
            'recipient_count' => $this->$recipient_count,
            'recipients' => $this->$recipients,
            'created_at' => $this->$created_at
        ];
    }
}