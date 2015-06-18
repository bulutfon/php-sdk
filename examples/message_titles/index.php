<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);
$message_titles = $provider->getMessageTitles($token);

?>
<html>
<head>
    <title>Message Titles</title>
</head>
<body>
<h2>Message Titles</h2>
<table>
    <thead>
    <tr style="text-align: center">
        <th>id</td>
        <th>Number</td>
        <th>State</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($message_titles as $message_title) { ?>
        <tr style="text-align: center">
            <td><?= $message_title->id; ?></td>
            <td><?= $message_title->name; ?></td>
            <td><?= $message_title->state; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>