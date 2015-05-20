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
<?php
    $file_path = getcwd().'/../incoming_faxes/abc.pdf';
    $arr = array('title' => 'API TEST', 'receivers' => '90850885xxxx,90850885yyyy', 'did' => "90850885xxxx", 'attachment' => $file_path);
    $resp = $provider->sendFax($token, $arr);
    print_r($resp->message);
?>
</body>
</html>