<?php
include_once '../classes/post.php';
$post = new post();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminName = $_POST['adminName'];
    $Email = $_POST['Email'];
    $adminUser = $_POST['adminUser'];
    $adminPass = $_POST['adminPass'];
    $roleID = $_POST['roleID'];
    $Active = $_POST['Active'];
    $Avatar = $_POST['Avatar'];
    // $insertPost = $post->insert_post();
    http_response_code(200);
    die();
}
http_response_code(400);