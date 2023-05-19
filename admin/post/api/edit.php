<?php
include_once __DIR__ . '/../../classes/post.php';
$post = new post();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = $_POST['adminID'];
    $adminName = $_POST['adminName'];
    $Email = $_POST['Email'];
    $adminUser = $_POST['adminUser'];
    $adminPass = $_POST['adminPass'];
    $roleID = $_POST['roleID'];
    $active = $_POST['Active'];
    $avatar = $_POST['Avatar'];
	// $insertPost = $post->update_user($id, $adminName, $Email, $adminPass, $roleID, $active, $avatar);
	http_response_code(200);
	die();
}
http_response_code(400);