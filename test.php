<?php
include_once __DIR__ . '/admin/adminManager/adminMenuManager.php';
include_once __DIR__ . '/admin/adminManager/repositories/adminMenuRepository.php';
$manager = new \Dev\AdminMenuManager();
$a = $manager->addRoleToMenu(3,13);
$b = $manager->deleteRoleFromMenu(3,13);