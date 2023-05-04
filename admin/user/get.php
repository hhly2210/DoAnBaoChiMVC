<?php
include_once '../classes/user.php';
include_once '../../lib/session.php';

Session::checkSession();
$id = $_GET["adminID"];
$user = new user();
$showUser = $user->show_user_one($id);
header('content-type:application/json');

$json = [];

if( $result = $showUser->fetch_assoc())
{
    $jsonString = json_encode($result);
    echo $jsonString;
}

