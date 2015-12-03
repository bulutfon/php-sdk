<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $resp = $provider->deleteAnnouncement($token, $id);

}else {
    echo "I don't know the ID";
    exit;
}
?>
<html>
<head>
    <title>Annoucement</title>
</head>
<body>
<h2>Annoucement</h2>
<?php

    print_r($resp->message);
?>
</body>
</html>