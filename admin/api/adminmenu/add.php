<?php
include_once __DIR__ . '/../../context/adminmenudata.php';
include_once __DIR__ . '/../../../lib/session.php';
// include_once __DIR__ . '/../../adminManager/adminMenuManager.php';
$menu = new adminmenudata();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminMenuName = $_POST['adminMenuName'];
    $ParentLevel = $_POST['adminMenuID'];
    $MenuOrder = $_POST['MenuOrder'];
    $Icon = $_POST['Icon'];
    $Link = $_POST['Link'];
    $ClassName = $_POST['ClassName'];
    $IsActive = $_POST['IsActive'];
    $insertadminmenu = $menu->insert_admin_menu($adminMenuName, $ParentLevel, $MenuOrder, $Icon, $Link, $IsActive, $ClassName);
    http_response_code(200);
    die();
}
http_response_code(400);