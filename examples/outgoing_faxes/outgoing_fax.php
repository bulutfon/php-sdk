<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $outgoing_fax = $provider->getOutgoingFax($token, $id);

}else {
    echo "I don't know the ID";
    exit;
}
?>
<html>
<head>
    <title>Outgoing Fax - <?=$_GET['id']?></title>
</head>
<body>

<h2>Outgoing Fax - <?= $outgoing_fax->id; ?></h2>
<ul>
    <li>ID: <?= $outgoing_fax->id; ?></li>
    <li>Title: <?= $outgoing_fax->title; ?></li>
    <li>Did: <?= $outgoing_fax->did; ?></li>
    <li>Recipient Count: <?= $outgoing_fax->recipient_count; ?></li>
    <li>Created At: <?= $outgoing_fax->created_at; ?></li>
    <li>Recipients:
        <ul>
            <?php $recipients =  $outgoing_fax->recipients;
            foreach($recipients as $recipient) { ?>
                <li><?= $recipient->number . " - " . $recipient->state ?></li>
            <?php } ?>
        </ul>
    </li>
</ul>
</body>
</html>