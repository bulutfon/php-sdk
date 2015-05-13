<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession();
$incoming_faxes = $provider->getIncomingFaxes($token);

?>
<html>
<head>
    <title>Incoming Faxes</title>
</head>
<body>
    <h2>Incoming Faxes</h2>
    <table>
        <thead>
            <tr style="text-align: center">
                <th>uuid</td>
                <th>Sender</td>
                <th>Receiver</td>
                <th>Created At</td>
                <th></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($incoming_faxes as $incoming_fax) { ?>
                <tr style="text-align: center">
                    <td><?= $incoming_fax->uuid; ?></td>
                    <td><?= $incoming_fax->sender; ?></td>
                    <td><?= $incoming_fax->receiver; ?></td>
                    <td><?= $incoming_fax->created_at; ?></td>
                    <td><a href="incoming_fax.php?id=<?= $incoming_fax->uuid; ?>">Download</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>