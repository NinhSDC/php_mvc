<?php
class Admin extends Controller
{
    public $Role;
    public function __construct()
    {
        $this->Role = $this->Model("RoleModel");
    }

    function index()
    {
        if (isset($_SESSION['accountTMP'])) {

            $userId = $_SESSION['accountTMP'][0];

            $getUserRole = $this->Role->GetRoleUser($userId);

            if ($getUserRole != 1) {
                header('location: /php_mvc/Login');
            }

            header('location: /php_mvc/Admin');
        } else {
            header('location: /php_mvc/Login');
        }

        $this->View(
            "AdminView",
            []
        );
    }
}
