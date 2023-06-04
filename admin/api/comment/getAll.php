<?php
include_once __DIR__ . '/../../context/comment.php';
include_once __DIR__ . '/../../../lib/session.php';

Session::checkSession();

$comment = new comment();
$showComment = $comment->show_comment();

$json = [];

while ($result = $showComment->fetch_assoc()) {
    $tmp = array(
        'commentID' => $result['commentID'],
        'Title' => $result['Title'],
        'userName' => $result['userName'],
        'comment' => $result['comment']
    );
    $json[] = $tmp;
}

$jsonString = json_encode($json);
header('content-type:application/json');
echo $jsonString;
