<?php
include '../context/user.php';
$user = new user();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);
    $insertUser = $user->delete_user($input['adminID']);
    http_response_code(200);
    die();
}
http_response_code(400);