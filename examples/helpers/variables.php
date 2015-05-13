<?php
$provider = new \Bulutfon\OAuth2\Client\Provider\Bulutfon([
    'clientId'      => 'd8891d797d19da7438b279168c6d545758422334a5f57c7ce83bf055fbdec214',
    'clientSecret'  => '823bdf18eb3a78d36513c7f81e6697e515d1cbc2970fa1fb08e87f803ce922f8',
    'redirectUri'   => 'http://example.com/php-sdk/examples/callback.php',
    'scopes'        => ['cdr'],
    //'verifySSL'     => false
]);
