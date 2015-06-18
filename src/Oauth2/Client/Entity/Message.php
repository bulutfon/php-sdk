<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 23/04/15
 * Time: 13:08
 */

namespace Bulutfon\OAuth2\Client\Entity;

class Message extends BaseEntity {
    protected $id;
    protected $title;
    protected $content;
    protected $sent_as_single_sms;
    protected $is_planned_sms;
    protected $send_date;
    protected $recipients;
    protected $created_at;

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'sent_as_single_sms' => $this->sent_as_single_sms,
            'is_planned_sms' => $this->is_planned_sms,
            'send_date' => $this->send_date,
            'recipients' => $this->recipients,
            'created_at' => $this->created_at,
        ];
    }
}