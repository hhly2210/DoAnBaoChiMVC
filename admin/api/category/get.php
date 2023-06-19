<?php
include_once __DIR__ . '/../../context/category.php';
include_once  __DIR__ . '/../../../lib/session.php';

Session::checkSession();
$id = $_GET["catID"];
$cat = new category();
$showCate = $cat->show_category_one($id);
header('content-type:application/json');

$json = [];

if ($result = $showCate->fetch_assoc()) {
    $jsonString = json_encode($result);
    echo $jsonString;
}

