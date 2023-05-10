<?php
include_once '../classes/category.php';
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);
    $insertCat = $cat->delete_category($input['catID']);
    http_response_code(200);
    die();
}
http_response_code(400);