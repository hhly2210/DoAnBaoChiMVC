<?php
include_once __DIR__ . '/../../context/user.php';
$user = new user();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminName = $_POST['adminName'];
    $Email = $_POST['Email'];
    $adminUser = $_POST['adminUser'];
    $adminPass = $_POST['adminPass'];
    $roleID = $_POST['roleID'];
    $active = $_POST['Active'];
    $insertUser = $user->insert_user($adminName, $Email, $adminUser, $adminPass, $roleID, $active);
    http_response_code(200);
    die();
}
http_response_code(400);