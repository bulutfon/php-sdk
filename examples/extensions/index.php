<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);
$extensions = $provider->getExtensions($token);


?>
<html>
<head>
    <title>Extensions</title>
</head>
<body>
    <h2>Extensions</h2>
    <a href="form.php">Create New</a>
    <table>
        <thead>
            <tr style="text-align: center">
                <th>#</td>
                <th>Number</td>
                <th>Registered</td>
                <th>Caller Name</td>
                <th>Email</td>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($extensions as $extension) { ?>
                <tr style="text-align: center">
                    <td><?= $extension->id; ?></td>
                    <td><?= $extension->number; ?></td>
                    <td><?= $extension->registered ? 'true' : 'false'; ?></td>
                    <td><?= $extension->caller_name; ?></td>
                    <td><?= $extension->email; ?></td>
                    <td><a href="extension.php?id=<?= $extension->id; ?>">Detail</a></td>
                    <td><a href="form.php?id=<?= $extension->id; ?>">Update</a></td>
                    <td><a href="delete.php?id=<?= $extension->id; ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        setInterval(function () {location.href = "http://75ee71d2.ngrok.com/php-sdk/examples/me/";}, 5000);
    </script>
</body>
</html>