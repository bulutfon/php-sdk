<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $automatic_call = $provider->getAutomaticCall($token, $id);

}else {
    echo "I don't know the ID";
    exit;
}
?>
<html>
<head>
    <title>Automatic Call - <?=$_GET['id']?></title>
</head>
<body>

<h2>Automatic Call - <?= $automatic_call->id; ?></h2>
<ul>
    <li>ID: <?= $automatic_call->id; ?></li>
    <li>Title: <?= $automatic_call->title; ?></li>
    <li>Did: <?= $automatic_call->did; ?></li>
    <li>Announcement: <?= $automatic_call->announcement; ?></li>
    <li>Gather: <?= $automatic_call->gather; ?></li>
    <li>Created At: <?= $automatic_call->created_at; ?></li>
    <li>Recipients:
        <ul>
            <?php $recipients =  $automatic_call->recipients;
            foreach($recipients as $recipient) { ?>
                <li><?= $recipient->uuid . " - " . $recipient->number . " - " . ($recipient->has_called ? "TRUE" : "FALSE") . " - " . $recipient->gather ?></li>
            <?php } ?>
        </ul>
    </li>

    <?php $call_range = $automatic_call->call_range; ?>
    <li>
        Working Hours:
        <ul>
            <li>Monday: <?= ($call_range->monday->active ? 'Open' : 'Closed') . " / " . $call_range->monday->start ." - ". $call_range->monday->finish ?></li>
            <li>Tuesday: <?= ($call_range->tuesday->active ? 'Open' : 'Closed') . " / " . $call_range->monday->start ." - ". $call_range->tuesday->finish ?></li>
            <li>Wednesday: <?= ($call_range->wednesday->active ? 'Open' : 'Closed') . " / " . $call_range->wednesday->start ." - ". $call_range->wednesday->finish ?></li>
            <li>Thursday: <?= ($call_range->thursday->active ? 'Open' : 'Closed') . " / " . $call_range->thursday->start ." - ". $call_range->thursday->finish ?></li>
            <li>Friday: <?= ($call_range->friday->active ? 'Open' : 'Closed') . " / " . $call_range->friday->start ." - ". $call_range->friday->finish ?></li>
            <li>Saturday: <?= ($call_range->saturday->active ? 'Open' : 'Closed') . " / " . $call_range->saturday->start ." - ". $call_range->saturday->finish ?></li>
            <li>Sunday: <?= ($call_range->sunday->active ? 'Open' : 'Closed') . " / " . $call_range->sunday->start ." - ". $call_range->sunday->finish ?></li>

        </ul>
    </li>
</ul>
</body>
</html>