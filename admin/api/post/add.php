<?php
include_once __DIR__ . '/../../context/post.php';
include_once __DIR__ . '/../../../lib/session.php';
$post = new post();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Title = $_POST['Title'];
    $Abstract = $_POST['Abstract'];
    $Contents = $_POST['Contents'];
    $Images = $_POST['Images'];
    $catID = $_POST['catID'];
    $adminID = Session::get('adminID');
    $insertPost = $post->insert_post($Title, $Abstract, $Contents, $Images, $catID, $adminID);
    http_response_code(200);
    die();
}
http_response_code(400);