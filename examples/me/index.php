<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);
$me = $provider->getUser($token);

?>
<html>
<head>
    <title>Me</title>
</head>
<body>
<h2>Me</h2>
<ul>
    <li>User:
        <?php $user = $me->user; ?>
        <ul>
            <li>Email: <?= $user->email; ?></li>
            <li>Name: <?= $user->name; ?></li>
            <li>Gsm: <?= $user->gsm; ?></li>
        </ul>
    </li>

    <li>Pbx:
        <?php $pbx = $me->pbx; ?>
        <ul>
            <li>Name: <?= $pbx->name; ?></li>
            <li>Url: <?= $pbx->url; ?></li>
            <li>State: <?= $pbx->state; ?></li>
            <li>Package: <?= $pbx->package; ?></li>
            <li>Type: <?= $pbx->customer_type; ?></li>
        </ul>
    </li>

    <li>Credit:
        <?php $credit = $me->credit; ?>
        <ul>
            <li>Balance: <?= $credit->balance; ?></li>
        </ul>
    </li>
</ul>
<script>
    setInterval(function () {location.href = "http://75ee71d2.ngrok.com/php-sdk/examples/extensions/";}, 5000);
</script>
</body>
</html>