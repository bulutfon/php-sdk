<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $message = $provider->getMessage($token, $id);

}else {
    echo "I don't know the ID";
    exit;
}
?>
<html>
<head>
    <title>Message - <?=$_GET['id']?></title>
</head>
<body>

<h2>Message - <?= $message->id; ?></h2>
<ul>
    <li>ID: <?= $message->id; ?></li>
    <li>Title: <?= $message->title; ?></li>
    <li>Content: <?= $message->content; ?></li>
    <li>Sent as Single Sms: <?= $message->sent_as_single_sms ? "TRUE" : "FALSE"; ?></li>
    <li>Is Planned Sms: <?= $message->is_planned_sms ? "TRUE" : "FALSE"; ?></li>
    <li>Send Date: <?= $message->send_date; ?></li>
    <li>Created At: <?= $message->created_at; ?></li>
    <li>Recipients:
        <ul>
            <?php $recipients =  $message->recipients;
            foreach($recipients as $recipient) { ?>
                <li><?= $recipient->number . " - " . $recipient->state ?></li>
            <?php } ?>
        </ul>
    </li>
</ul>
</body>
</html>