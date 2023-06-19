<?php
include_once __DIR__ .'/../../context/adminmenudata.php';
include_once __DIR__ .'/../../../lib/session.php';

Session::checkSession();
$id = $_GET["adminMenuID"];
$menu = new adminmenudata();
$showCate = $menu->show_admin_menu_one($id);
header('content-type:application/json');

$json = [];

if ($result = $showCate->fetch_assoc()) {
    $jsonString = json_encode($result);
    echo $jsonString;
}

