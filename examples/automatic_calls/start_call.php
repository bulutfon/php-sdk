<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);

?>
<html>
<head>
    <title>Automatic Calls</title>
</head>
<body>
<h2>Automatic Calls</h2>
<?php
    $arr = array('title' => 'API ARAMA TEST', 'receivers' => '90850885xxxx,90850885yyyy',
        'did' => "90850885xxxx", 'gather' => true, 'announcement_id' => 'yyy',

        // Tarih ve saatler opsiyonel varsayılan olarak aktif => true start => 09:00 finish => 18:00 olacaktır
        'mon_active' => true, 'mon_start' => '12:15', 'mon_finish' => '12:15',
        'tue_active' => true, 'tue_start' => '12:15', 'tue_finish' => '12:15',
        'wed_active' => true, 'wed_start' => '12:15', 'wed_finish' => '12:15',
        'fri_active' => true, 'fri_start' => '12:15', 'fri_finish' => '12:15',
        'thu_active' => true, 'thu_start' => '12:15', 'thu_finish' => '12:15',
        'sat_active' => true, 'sat_start' => '12:15', 'sat_finish' => '12:15',
        'sun_active' => true, 'sun_start' => '12:15', 'sun_finish' => '12:15'
    );
    $resp = $provider->createAutomaticCall($token, $arr);
    print_r($resp->message);
?>
</body>
</html>