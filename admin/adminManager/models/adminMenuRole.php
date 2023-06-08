<?php

namespace Dev;

class AdminMenuRole
{
    public int $adminMenuID;
    public int $roleID;

    public function __construct()
    {
        $this->adminMenuID = 0;
        $this->roleID = 0;
    }
}
