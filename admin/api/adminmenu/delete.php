<?php
include_once __DIR__ . '/../../context/adminmenudata.php';
$menu = new adminmenudata();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);
    $insertCat = $menu->delete_admin_menu($input['adminMenuID']);
    http_response_code(200);
    die();
}
http_response_code(400);