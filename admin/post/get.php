<?php
include_once '../classes/post.php';
include_once '../../lib/session.php';

Session::checkSession();
$id = $_GET["adminID"];
$post = new post();
$showpost = $post->show_post_one($id);
header('content-type:application/json');

$json = [];

if( $result = $showpost->fetch_assoc())
{
    $jsonString = json_encode($result);
    echo $jsonString;
}

