<?php

namespace Dev;

include_once __DIR__ . '/repositories/adminMenuRepository.php';
include_once __DIR__ . '/repositories/adminMenuRoleRepository.php';
include_once __DIR__ . '/repositories/roleUrlRepository.php';
include_once __DIR__ . '/models/adminMenuRole.php';
include_once __DIR__ . '/models/adminMenu.php';
include_once __DIR__ . '/models/roleUrl.php';
class AdminMenuManager
{
    private \Dev\AdminMenuRepository $adminMenuRepo;
    private \Dev\AdminMenuRoleRepository $adminMenuRoleRepo;
    private \Dev\RoleUrlRepository $roleUrlRepo;

    public function __construct()
    {
        $this->adminMenuRepo = new \Dev\AdminMenuRepository();
        $this->adminMenuRoleRepo = new \Dev\AdminMenuRoleRepository();
        $this->roleUrlRepo = new \Dev\RoleUrlRepository();
    }

    /**
     * addRoleToMenu
     *
     * @param  int $roleId
     * @param  int $menuId
     * @return bool
     */
    public function addRoleToMenu($roleId, $menuId)
    {
        $menuRole = new \Dev\AdminMenuRole();
        $menuRole->adminMenuID = $menuId;
        $menuRole->roleID = $roleId;
        if ($this->adminMenuRoleRepo->insert($menuRole,true)) {
            $menu = $this->adminMenuRepo->selectOneById([$menuId]);
            if (gettype($menu) != 'boolean') {
                $roleUrl = new \Dev\RoleUrl();
                $roleUrl->roleID = $roleId;
                $roleUrl->url = '/' . preg_quote($menu->Link, '/') . '/';
                return $this->roleUrlRepo->insert($roleUrl);
            }
        }
        return false;
    }
    
    /**
     * deleteRoleFromMenu
     *
     * @param  int $roleId
     * @param  int $menuId
     * @return bool
     */
    public function deleteRoleFromMenu($roleId, $menuId) {
        if ($this->adminMenuRoleRepo->delete([$menuId, $roleId])) {
            $menu = $this->adminMenuRepo->selectOneById([$menuId]);
            if (gettype($menu) != 'boolean') {
                $url = '/' . preg_quote($menu->Link, '/') . '/';
                return $this->roleUrlRepo->deleteByRoleIdAndUrl($roleId, $url);
            }
        }
        return false;
    }
}
