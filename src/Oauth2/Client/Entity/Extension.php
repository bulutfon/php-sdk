<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 23/04/15
 * Time: 13:07
 */

namespace Bulutfon\OAuth2\Client\Entity;

class Extension extends BaseEntity {
    protected $id;
    protected $number;
    protected $registered;
    protected $caller_name;
    protected $email;
    protected $did;
    protected $voice_mail;
    protected $redirection_type;
    protected $destination_type;
    protected $destination_number;
    protected $external_number;
    protected $acl;

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'registered' => $this->registered,
            'caller_name' => $this->caller_name,
            'email' => $this->email,
            'did' => $this->did,
            'voice_mail' => $this->voice_mail,
            'redirection_type' => $this->redirection_type,
            'destination_type' => $this->destination_type,
            'destination_number' => $this->destination_number,
            'external_number' => $this->external_number,
            'acl' => $this->acl,
        ];
    }
}