<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession();

$params = array(
    'full_name' => $_POST['full_name'], #required
    'email' => $_POST['email'], #required
    'did' => $_POST['did'], #required
    'number' => $_POST['number'], #required
    'voicemail' => $_POST['voicemail'], #required
    'acl' => $_POST['acl'], #required
    'redirection_type' => $_POST['redirection_type'], #required
    'destination_type' => $_POST['destination_type'], #required unless redirection_type is not NONE or EXTERNAL
    'destination_number' => $_POST['destination_number'], #required unless redirection_type is not NONE or EXTERNAL
    'external_number' => $_POST['external_number'] #required if redirection_type is EXTERNAL
);

$provider->createExtension($token, $params);
header('Location: index.php');
