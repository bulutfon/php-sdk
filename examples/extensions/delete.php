<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession($provider);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $extension = $provider->deleteExtension($token, $id);
    header('Location: index.php');
}else {
    echo "I don't know the ID";
    exit;
}