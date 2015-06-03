<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $params = array(
        'full_name' => $_POST['full_name'],
        'email' => $_POST['email'],
        'did' => $_POST['did'],
        'number' => $_POST['number'],
        'voicemail' => $_POST['voicemail'],
        'acl' => $_POST['acl'],
        'redirection_type' => $_POST['redirection_type'],
        'destination_type' => $_POST['destination_type'],
        'destination_number' => $_POST['destination_number'],
        'external_number' => $_POST['external_number']
    );

    $provider->updateExtension($token, $id, $params);
    header('Location: index.php');
}else {
    echo "I don't know the ID";
    exit;
}