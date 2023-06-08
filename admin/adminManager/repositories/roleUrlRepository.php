<?php

namespace Dev;

include_once __DIR__ . '/../../../config/config.php';
include_once __DIR__ . '/../lib/database.php';
/**
 * @extends MySqlDatabase<RoleUrl>
 */
class RoleUrlRepository extends MySqlDatabase
{
    public function __construct()
    {
        parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME, 'tbl_roleurl', ['urlID' => 'i'], ['roleID' => 'i', 'url' => 's']);
    }

    /**
     * deleteByRoleIdAndUrl
     *
     * @param  int $roleId
     * @param  string $url
     * @return boolean
     */
    public function deleteByRoleIdAndUrl($roleId, $url)
    {
        return $this->deleteRaw(['roleID' => $roleId, 'url' => $url], 'is');
    }
}
