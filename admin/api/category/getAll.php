<?php
include_once __DIR__ . '/../../context/category.php';
include_once __DIR__ . '/../../../lib/session.php';

Session::checkSession();

$cat = new category();
$showCate = $cat->show_category();

$json = [];

while ($result = $showCate->fetch_assoc()) {
    $tmp = array(
        'catID' => $result['catID'],
        'catName' => $result['catName'],
        'catDescription' => $result['catDescription'],
        'parentID' => $result['parentID']
    );
    $json[] = $tmp;
}

$jsonString = json_encode($json);
header('content-type:application/json');
echo $jsonString;
