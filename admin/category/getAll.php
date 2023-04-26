<?php
include_once '../classes/category.php';
include_once '../../lib/session.php';

Session::checkSession();

$cat = new category();
$showCate = $cat->show_category();

$json = [];

while ( $result = $showCate->fetch_assoc())
{
    $tmp = array(
        'catID' => $result['catID'],
        'catName' => $result['catName'],
        'catDescription' => $result['catDescription'] );
    $json[] = $tmp;
}

$jsonString = json_encode( $json );
header('content-type:application/json');
echo $jsonString;