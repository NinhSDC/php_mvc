<?php
class Admin extends Controller
{
    public $RoleModel;
    public $AdminModel;

    public function __construct()
    {
        $this->RoleModel = $this->Model("RoleModel");
        $this->AdminModel = $this->Model("AdminModel");
    }

    function index()
    {
        if (!isset($_SESSION['accountTMP'])) {
            header('location: /php_mvc/Login');
        }
        if ($_SESSION['accountTMP'][1] != 1) {
            header('location: /php_mvc/Login');
        }



        $this->View(
            "AdminView",
            [
                "page" => "homePageAdmin",
                "NumberOrders" => $this->AdminModel->NumberOrders()
            ]
        );
    }
}
