<?php
include_once __DIR__ . '/../../lib/session.php';
function checkAllowUrl()
{
    $allowUrls = array("/admin/page/login.php", "/admin/page/logout.php", "/admin/page/index.php", "/admin/page/settings/changePassword.php",
        "/admin/page/settings/accountInformation.php");
    $url = $_SERVER['REQUEST_URI'];
    if (!kiemTra($url, $allowUrls)) {
        $roleId = Session::get('roleID');
        if ($roleId == false || $roleId != 1) {
            $userUrl = Session::get('urls');
            if (!$userUrl || !kiemTra($url, $userUrl)) {
                header('Location: /admin/page/pages-403.php');
                die();
            }
        }
    }
}

function kiemTra($url, $regexArr)
{
    foreach ($regexArr as $regex)
        if (preg_match("#" . $regex . "#", $url))
            return true;
    return false;
}
