<?php
include_once '../classes/role.php';
include_once '../../lib/session.php';

Session::checkSession();

$role = new role();
$roles = $role->get_all();

$json = [];

while ($result = $roles->fetch_assoc()) {
    $json[] = $result;
}

$jsonString = json_encode($json);
header('content-type:application/json');
echo $jsonString;
