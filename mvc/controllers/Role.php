<?php
class Role extends Controller
{
    public $Role;

    public function __construct()
    {
        $this->Role = $this->Model("RoleModel");
    }

    function index() {}

    function GetRoleUser($userID)
    {
        $roleUser =  $this->Role->GetRoleUser($userID);
        return $roleUser;
    }
}
