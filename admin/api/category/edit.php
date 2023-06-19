<?php
include_once __DIR__ . '/../../context/category.php';
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['catID'];
    $catName = $_POST['catName'];
    $parentID = $_POST['parentID'];
    $catDescription = $_POST['catDescription'];
    $insertCat = $cat->update_category($id, $catName, $catDescription, $parentID);
    http_response_code(200);
    die();
}
http_response_code(400);