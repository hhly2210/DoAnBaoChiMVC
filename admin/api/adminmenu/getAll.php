<?php
include_once __DIR__ . '/../../context/adminmenudata.php';
include_once __DIR__ . '/../../../lib/session.php';

Session::checkSession();

$menu = new adminmenudata();
$show = $menu->show_admin_menu();

$json = [];

while ($result = $show->fetch_assoc()) {
    $tmp = array(
        'adminMenuID' => $result['adminMenuID'],
        'adminMenuName' => $result['adminMenuName'],
        'ParentLevel' => $result['ParentLevel'],
        'MenuOrder' => $result['MenuOrder'],
        'MenuTarget' => $result['MenuTarget'],
        'Icon' => $result['Icon'],
        'Link' => $result['Link'],
        'IdName' => $result['IdName'],
        'IsActive' => $result['IsActive'],
        'ClassName' => $result['ClassName']
    );
    $json[] = $tmp;
}

$jsonString = json_encode($json);
header('content-type:application/json');
echo $jsonString;
