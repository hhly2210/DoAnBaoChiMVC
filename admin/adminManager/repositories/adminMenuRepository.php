<?php

namespace Dev;

include_once __DIR__ . '/../../../config/config.php';
include_once __DIR__ . '/../lib/database.php';
/**
 * @extends MySqlDatabase<AdminMenu>
 */
class AdminMenuRepository extends MySqlDatabase
{
    public function __construct()
    {
        parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME, 'tbl_adminmenu', ['adminMenuID' => 'i'], [
            'adminMenuName' => 's',
            'ParentLevel' => 'i',
            'MenuOrder' => 'i',
            'MenuTarget' => 's',
            'Icon' => 's',
            'Link' => 's',
            'IdName' => 's',
            'IsActive' => 'b',
            'ClassName' => 's',
        ]);
    }
}
