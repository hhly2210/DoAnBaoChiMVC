<?php

namespace Dev;

class AdminMenu
{
    public int $adminMenuID;
    public string $adminMenuName;
    public int $ParentLevel;
    public int $MenuOrder;
    public string $MenuTarget;
    public string $Icon;
    public string $Link;
    public string $IdName;
    public bool $IsActive;
    public string $ClassName;


    public function __construct()
    {
        $this->adminMenuID = 0;
        $this->adminMenuName = '';
        $this->ParentLevel = 0;
        $this->MenuOrder = 0;
        $this->MenuTarget = 0;
        $this->Icon = '';
        $this->Link = '';
        $this->IdName = '';
        $this->IsActive = false;
        $this->ClassName = '';
    }
}
