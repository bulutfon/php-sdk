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
    <li><a href="incoming_faxes">INCOMING FAXES</a></li>
    <li><a href="outgoing_faxes">OUTGOING FAXES</a></li>
    <li><a href="announcements">ANNOUNCEMENTS</a></li>
    <li><a href="automatic_calls">AUTOMATIC CALLS</a></li>
    <li><a href="message_titles">MESSAGE TITLES</a></li>
    <li><a href="messages">MESSAGES</a></li>
    <li><a href="token_info">TOKEN INFO</a></li>
</ul>
</body>
</html>