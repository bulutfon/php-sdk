<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 23/04/15
 * Time: 13:08
 */

namespace Bulutfon\OAuth2\Client\Entity;

class Announcement extends BaseEntity {
    protected $id;
    protected $name;
    protected $file_name;
    protected $is_on_hold_music;
    protected $created_at;

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'file_name' => $this->file_name,
            'is_on_hold_music' => $this->is_on_hold_music,
            'created_at' => $this->created_at
        ];
    }
}