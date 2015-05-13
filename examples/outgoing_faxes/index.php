<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession();
$outgoing_faxes = $provider->getOutgoingFaxes($token);

?>
<html>
<head>
    <title>Outgoing Faxes</title>
</head>
<body>
    <h2>Outgoing Faxes</h2>
    <table>
        <thead>
            <tr style="text-align: center">
                <th>id</td>
                <th>Title</td>
                <th>Did</td>
                <th>Recipient Count</td>
                <th>Created At</td>
                <th></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($outgoing_faxes as $outgoing_fax) { ?>
                <tr style="text-align: center">
                    <td><?= $outgoing_fax->id; ?></td>
                    <td><?= $outgoing_fax->title; ?></td>
                    <td><?= $outgoing_fax->did; ?></td>
                    <td><?= $outgoing_fax->recipient_count; ?></td>
                    <td><?= $outgoing_fax->created_at; ?></td>
                    <td><a href="outgoing_fax.php?id=<?= $outgoing_fax->id; ?>">Detail</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>