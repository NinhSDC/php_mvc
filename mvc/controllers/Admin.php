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

        $this->renderAdminView('homePageAdmin', []);
    }

    function renderAdminView($page, $additionalData = [])
    {
        $baseData = [
            "page" => $page,
            "NumberOrders" => $this->AdminModel->NumberOrders(),
            "NumberUsers" => $this->AdminModel->NumberUsers(),
            "NumberProductsActive" => $this->AdminModel->NumberProductsActive(),
            "NumberProductsNoActive" => $this->AdminModel->NumberProductsNoActive(),
            "NumberOrderPendingApproval" => $this->AdminModel->NumberOrderPendingApproval()
        ];

        // Gộp dữ liệu cơ bản với dữ liệu bổ sung
        $data = array_merge($baseData, $additionalData);

        $this->View("AdminView", $data);
    }


    function OrderManagementAdmin($current_page = 1)
    {
        $limit = 4;

        $total_records = $this->OrderModel->GetCountOrders();

        $total_page = ceil($total_records / $limit);

        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;

        $arrayView = [
            "GetAllOrder" => $this->OrderModel->GetAllOrder($start, $limit),
            "currentPage" => $current_page,
            "totalPage" => $total_page
        ];
        $this->renderAdminView('OrderManagementAdmin', $arrayView);
    }

    function InfoOrderAdmin($idOrder)
    {
        $arrayView = [
            "GetAllOrder" => $this->OrderModel->infOrderId($idOrder)
        ];
        $this->renderAdminView('editOrderAdmin', $arrayView);
    }

    function EditOrder()
    {
        if (isset($_POST['submit'])) {
            $status = $_POST['status'];
            $idOrder = $_POST['IdOrder'];
            $nameOrder = $_POST['nameOrder'];
            $phoneNumber = $_POST['phoneNumber'];
            $email = $_POST['email'];
        }

        $result = $this->OrderModel->EditOrder($idOrder, $nameOrder, $phoneNumber, $email, $status);

        if ($result) {
            header('location: /php_mvc/admin/OrderManagementAdmin/');
        }
        $this->renderAdminView('editOrderAdmin', []);
    }
}
