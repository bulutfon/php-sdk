<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);
$automatic_calls = $provider->getAutomaticCalls($token);

?>
<html>
<head>
    <title>Automatic Calls</title>
</head>
<body>
    <h2>Automatic Calls</h2>
    <table>
        <thead>
            <tr style="text-align: center">
                <th>id</td>
                <th>Title</td>
                <th>Did</td>
                <th>Announcement</td>
                <th>Sound Url</td>
                <th>Gather</td>
                <th>Created At</td>
                <th></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($automatic_calls as $automatic_call) { ?>
                <tr style="text-align: center">
                    <td><?= $automatic_call->id; ?></td>
                    <td><?= $automatic_call->title; ?></td>
                    <td><?= $automatic_call->did; ?></td>
                    <td><?= $automatic_call->announcement; ?></td>
                    <td><?= $automatic_call->sound_url; ?></td>
                    <td><?= $automatic_call->gather; ?></td>
                    <td><?= $automatic_call->created_at; ?></td>
                    <td><a href="automatic_call.php?id=<?= $automatic_call->id; ?>">Detail</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>