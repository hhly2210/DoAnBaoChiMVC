<?php
include '../../lib/session.php';
Session::checkSession();
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GAT");
header("Cache-Control: max-age = 10800");
?>
