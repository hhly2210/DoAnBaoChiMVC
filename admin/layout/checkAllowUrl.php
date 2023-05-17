<?php
include_once __DIR__ . '/../../lib/session.php';
function checkAllowUrl()
{
	$allowUrls = array("/admin/login.php", "/admin/logout.php", "/admin/index.php", "/admin/settings/changePassword.php", "/admin/settings/accountInformation.php");
	$url = $_SERVER['REQUEST_URI'];
	if (!kiemTra($url, $allowUrls)) {
		$roleId = Session::get('roleID');
		if ($roleId == false || $roleId != 1) {
			$userUrl = Session::get('urls');
			if (!$userUrl || !kiemTra($url, $userUrl)) {
				header('Location: /admin/pages-403.php');
				die();
			}
		}
	}
}

function kiemTra($url, $regexArr) {
	foreach($regexArr as $regex)
		if(preg_match("#".$regex."#", $url))
			return true;
	return false;
}
