<?php
include_once __DIR__ . '/../../context/post.php';
$post = new post();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['postID'];
    $Title = $_POST['Title'];
    $Abstract = $_POST['Abstract'];
    $Contents = $_POST['Contents'];
    $Images = $_POST['Images'];
    $catID = $_POST['catID'];
    $IsActive = $_POST['IsActive'];
    $insertPost = $post->update_post($id, $Title, $Abstract, $Contents, $Images, $IsActive, $catID);
    http_response_code(200);
    die();
}
http_response_code(400);