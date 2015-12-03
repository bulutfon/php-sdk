<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);
?>
<html>
<head>
    <title>Annoucement</title>
</head>
<body>
<h2>Annoucement</h2>
<?php
    $file_path = getcwd().'/test.wav';

    $arr = array('name' => 'API TEST2', 'announcement' => $file_path);
    $resp = $provider->createAnnouncement($token, $arr);
    print_r($resp);
?>
</body>
</html>