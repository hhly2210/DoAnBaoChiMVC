<?php
include_once __DIR__ . '/../../context/post.php';
include_once __DIR__ . '/../../../lib/session.php';

Session::checkSession();

$post = new post();
$showPost = $post->show_user_post(Session::get('adminID'));

$json = [];

while ($result = $showPost->fetch_assoc()) {
    $tmp = array(
        'postID' => $result['postID'],
        'Title' => $result['Title'],
        'Abstract' => $result['Abstract'],
        'Contents' => $result['Contents'],
        'Link' => $result['Link'],
        'CreatedDate' => $result['CreatedDate'],
        'IsActive' => $result['IsActive'],
        'catName' => $result['catName'],
        'adminName' => $result['adminName']);
    $json[] = $tmp;
}

$jsonString = json_encode($json);
header('content-type:application/json');
echo $jsonString;