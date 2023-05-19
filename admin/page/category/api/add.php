<?php
include_once '../context/category.php';
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catName = $_POST['catName'];
    $catDescription = $_POST['catDescription'];
    $insertCat = $cat->insert_category($catName, $catDescription);
    http_response_code(200);
    die();
}
http_response_code(400);