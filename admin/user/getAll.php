<?php
include_once '../classes/user.php';
include_once '../../lib/session.php';

Session::checkSession();

$user = new user();
$showUser = $user->show_user();

$json = [];

while ( $result = $showUser->fetch_assoc())
{
    $tmp = array(
        'adminID' => $result['adminID'],
        'adminName' => $result['adminName'],
        'Email' => $result['Email'],
        'roleID' => $result['roleID'],
        'Active' => $result['Active'],
        'Avatar' => $result['Avatar']);
    $json[] = $tmp;
}

$jsonString = json_encode( $json );
header('content-type:application/json');
echo $jsonString;