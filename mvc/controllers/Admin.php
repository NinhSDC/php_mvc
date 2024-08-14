<?php
class Admin extends Controller
{
    public $RoleModel;
    public $AdminModel;
    public $OrderModel;

    public function __construct()
    {
        $this->RoleModel = $this->Model("RoleModel");
        $this->AdminModel = $this->Model("AdminModel");
        $this->OrderModel = $this->Model("OrderModel");
    }

    function index()
    {
        if (!isset($_SESSION['accountTMP'])) {
            header('location: /php_mvc/Login');
        }
        if ($_SESSION['accountTMP'][1] != 1) {
            header('location: /php_mvc/Login');
        }

        $this->Views('homePageAdmin');
    }

    function Views($page)
    {
        $this->View(
            "AdminView",
            [
                "page" => $page,
                "NumberOrders" => $this->AdminModel->NumberOrders(),
                "NumberUsers" => $this->AdminModel->NumberUsers(),
                "NumberProductsActive" => $this->AdminModel->NumberProductsActive(),
                "NumberProductsNoActive" => $this->AdminModel->NumberProductsNoActive(),
                "NumberOrderPendingApproval" => $this->AdminModel->NumberOrderPendingApproval()
            ]
        );
    }

    function OrderManagementAdmin()
    {
        $this->Views('OrderManagementAdmin');
        $this->View(
            "AdminView",
            [
                "getAllOrder" => $this->OrderModel->getAllOrder()
            ]
        );
    }
}
