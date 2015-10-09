<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);
$token_info = $provider->getTokenInfo($token);
?>

<html>
<head>
    <title>Token Info</title>
</head>
<body>

<h2>Token Info</h2>
<ul>
    <li>Token: <?= $token_info->token; ?></li>
    <li>Expired: <?= $token_info->expired ? 'True' : 'False'; ?></li>
    <li>Expires In: <?= $token_info->expires_in; ?></li>

</ul>
</body>
</html>