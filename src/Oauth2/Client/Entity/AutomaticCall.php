<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 23/04/15
 * Time: 13:08
 */

namespace Bulutfon\OAuth2\Client\Entity;

class AutomaticCall extends BaseEntity {
    protected $id;
    protected $title;
    protected $did;
    protected $announcement;
    protected $gather;
    protected $recipients;
    protected $sound_url;
    protected $call_range;
    protected $created_at;

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'did' => $this->did,
            'announcement' => $this->announcement,
            'sound_url' => $this->sound_url,
            'gather' => $this->gather,
            'recipients' => $this->recipients,
            'call_range' => $this->call_range,
            'created_at' => $this->created_at
        ];
    }
}