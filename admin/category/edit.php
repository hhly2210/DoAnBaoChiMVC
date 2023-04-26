<?php

include '../classes/category.php';
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = $_POST['catID'];
	$catName = $_POST['catName'];
	$catDescription = $_POST['catDescription'];
    echo $catName;
	$insertCat = $cat->update_category($id, $catName, $catDescription);
	http_response_code(200);
	die();
}
http_response_code(400);