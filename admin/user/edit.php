<?php

include '../classes/user.php';
$user = new user();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = $_POST['adminID'];
    $adminName = $_POST['adminName'];
    $Email = $_POST['Email'];
    $adminUser = $_POST['adminUser'];
    $adminPass = $_POST['adminPass'];
    $roleID = $_POST['roleID'];
    $active = $_POST['Active'];
	$insertUser = $user->update_user($id, $adminName, $Email, $adminPass, $roleID, $active);
	http_response_code(200);
	die();
}
http_response_code(400);