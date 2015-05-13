<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $filename = $id.'.wav';
    $save_path = getcwd().'/'.$filename;
    $call_record = $provider->getCallRecord($token, $id, $save_path);

}else {
    echo "I don't know the ID";
    exit;
}
?>
<html>
<head>
    <title>Call Record - <?=$_GET['id']?></title>
</head>
<body>

    <?php
        header('Content-type: audio/wav');
        header('Content-Length: ' . filesize($save_path));
        header('Content-Disposition: attachment; filename='.$filename.'');
        while (ob_get_level()) {
            ob_end_clean();
        }
        readfile($save_path);
        exit();
    ?>
</body>
</html>