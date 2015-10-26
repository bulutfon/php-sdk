<?php
$provider = new \Bulutfon\OAuth2\Client\Provider\Bulutfon([
    'clientId'      => 'xxxxx',
    'clientSecret'  => 'yyyyy',
    'redirectUri'   => 'http://example.com/php-sdk/examples/callback.php',
    'scopes'        => ['cdr'],
//    'verifySSL'     => false
]);
