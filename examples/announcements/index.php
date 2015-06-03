<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);
$announcements = $provider->getAnnouncements($token);

?>
<html>
<head>
    <title>Announcements</title>
</head>
<body>
    <h2>Announcements</h2>
    <table>
        <thead>
            <tr style="text-align: center">
                <th>id</td>
                <th>Name</td>
                <th>File Name</td>
                <th>Is On Hold Music</td>
                <th>Created At</td>
                <th></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($announcements as $announcement) { ?>
                <tr style="text-align: center">
                    <td><?= $announcement->id; ?></td>
                    <td><?= $announcement->name; ?></td>
                    <td><?= $announcement->file_name; ?></td>
                    <td><?= $announcement->is_on_hold_music; ?></td>
                    <td><?= $announcement->created_at; ?></td>
                    <td><a href="announcement.php?id=<?= $announcement->id; ?>">Download</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>