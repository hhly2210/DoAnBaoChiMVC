<?php
include_once __DIR__ . '/../../context/post.php';
$post = new post();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);
    $insertPost = $post->delete_post($input['postID']);
    http_response_code(200);
    die();
}
http_response_code(400);