<?php
session_start();
require '../vendor/autoload.php';
require_once './helpers/variables.php';
require_once './helpers/functions.php';

$token = getAccessTokenFromSession($provider);
?>
<html>
<head>
    <title>BULUTFON API EXAMPLE</title>
</head>
<body>
<ul>
    <li><a href="me">Me</a></li>
    <li><a href="dids">DIDS</a></li>
    <li><a href="extensions">EXTENSIONS</a></li>
    <li><a href="groups">GROUPS</a></li>
    <li><a href="cdrs">CDRS</a></li>
</ul>
</body>
</html>