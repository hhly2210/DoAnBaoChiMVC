<?php

include '../classes/category.php';
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $catName = $_POST['catName'];
  $catDescription = $_POST['catDescription'];
  $insertCat = $cat->insert_category($catName, $catDescription);
  header("Location: list.php");
  die();
}