<?php
include_once __DIR__ . '/../../context/adminmenudata.php';
$menu = new adminmenudata();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['adminMenuID'];
    $adminMenuName = $_POST['adminMenuName'];
    $ParentLevel = $_POST['ParentLevel'];
    $MenuOrder = $_POST['MenuOrder'];
    $Icon = $_POST['Icon'];
    $Link = $_POST['Link'];
    $ClassName = $_POST['ClassName'];
    $IsActive = $_POST['IsActive'];
    $insertCat = $menu->update_admin_menu($id, $adminMenuName, $ParentLevel, $MenuOrder, $Icon, $Link, $IsActive, $ClassName);
    http_response_code(200);
    die();
}
http_response_code(400);