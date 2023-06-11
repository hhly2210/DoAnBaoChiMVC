<?php
include_once __DIR__ . '/../../context/category.php';
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catName = $_POST['catName'];
    $parentID = $_POST['catID'];
    $catDescription = $_POST['catDescription'];
    $insertCat = $cat->insert_category($catName, $catDescription, $parentID);
    http_response_code(200);
    die();
}
http_response_code(400);