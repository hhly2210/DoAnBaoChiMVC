<?php

namespace Dev;

include_once __DIR__ . '/../../../config/config.php';
include_once __DIR__ . '/../lib/database.php';
/**
 * @extends MySqlDatabase<AdminMenuRole>
 */
class AdminMenuRoleRepository extends MySqlDatabase
{
    public function __construct()
    {
        parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME, 'tbl_adminmenurole', ['adminMenuID' => 'i', 'roleID' => 'i'], []);
    }
}
