<?php
/**
 * Created by PhpStorm.
 * User: htkaya
 * Date: 09/10/15
 * Time: 14:24
 */

namespace Bulutfon\OAuth2\Client\Entity;


class TokenInfo extends BaseEntity {
    protected $token;
    protected $expired;
    protected $expires_in;

    public function getArrayCopy()
    {
        return [
            'token' => $this->token,
            'expired' => $this->expired,
            'expires_in' => $this->expires_in
        ];
    }
}