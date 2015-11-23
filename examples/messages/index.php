<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);

$messages = $provider->getMessages($token);

?>
<html>
<head>
    <title>Messages</title>
</head>
<body>
<h2>Messages</h2>
<table>
    <thead>
    <tr style="text-align: center">
        <th>ID</td>
        <th>Title</td>
        <th>Content</td>
        <th>Recipients</td>
        <th>Sent as Single Sms</td>
        <th>Created At</td>
        <th></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($messages as $message) { ?>
        <tr style="text-align: center">
            <td><?= $message->id; ?></td>
            <td><?= $message->title; ?></td>
            <td><?= $message->content; ?></td>
            <td><?= $message->recipients; ?></td>
            <td><?= $message->sent_as_single_sms ? "TRUE" : "FALSE"; ?></td>
            <td><?= $message->created_at; ?></td>
            <td><a href="message.php?id=<?= $message->id; ?>">Detail</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>