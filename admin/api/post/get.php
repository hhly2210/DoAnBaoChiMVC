<?php
include_once __DIR__ . '/../../context/post.php';
include_once __DIR__ . '/../../../lib/session.php';

Session::checkSession();
$id = $_GET["postID"];
$post = new post();
$showpost = $post->show_post_one($id);
header('content-type:application/json');

$json = [];

if ($result = $showpost->fetch_assoc()) {
    $jsonString = json_encode($result);
    echo $jsonString;
}

