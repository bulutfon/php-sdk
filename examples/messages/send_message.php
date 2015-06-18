<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);

?>
<html>
<head>
    <title>Send Message</title>
</head>
<body>
<h2>Send Message</h2>
<?php
$arr = array(
    'title' => 'TEST',
    'content' => 'Test Message',
    'receivers' => "905xxxxxxxxx,905xxxxxxxxx",
    'is_single_sms' => true, # OPSIYONEL, VARSAYILAN false
    'is_future_sms' => true, # OPSIYONEL, VARSAYILAN false
    'send_date' => '21/06/2015 20:22' # OPTIONAL (Eğer is_future_sms true olarak setlendiyse zorunlu)
);
$resp = $provider->sendMessage($token, $arr);
print_r($resp->message);
?>
</body>
</html>