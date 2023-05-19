<?php
include_once __DIR__ . '/../../context/user.php';
include_once __DIR__ .'/../../../lib/session.php';

Session::checkSession();
$id = $_GET["adminID"];
$user = new user();
$showUser = $user->show_user_one($id);
header('content-type:application/json');

$json = [];

if ($result = $showUser->fetch_assoc()) {
    unset($result['adminPass']);
    $jsonString = json_encode($result);
    echo $jsonString;
}

