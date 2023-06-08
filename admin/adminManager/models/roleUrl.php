<?php
namespace Dev;
class RoleUrl
{
    public int $urlID;
    public int $roleID;
    public string $url;

    public function __construct()
    {
        $this->urlID = 0;
        $this->roleID = 0;
        $this->url = '';
    }
}