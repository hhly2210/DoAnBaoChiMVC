<?php
include_once __DIR__ . '/../../context/comment.php';
$comment = new comment();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);
    $insertCat = $comment->delete_comment($input['commentID']);
    http_response_code(200);
    die();
}
http_response_code(400);