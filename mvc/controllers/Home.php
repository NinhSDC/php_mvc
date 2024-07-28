<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller
{
    public $CategoriesModel;
    public $ProductModel;
    public $CartModel;

    public function __construct()
    {
        $this->CategoriesModel = $this->Model("CategoriesModel");
        $this->ProductModel = $this->Model("ProductsModel");
        $this->CartModel = $this->Model("CartModel");
    }

    public function index()
    {
        $this->view(
            "homeView",
            [
                "page" => "homepage",
                "Categories" => $this->CategoriesModel->categorys(),
                "ProductNewHome" => $this->ProductModel->ProductNewHome(),
            ]
        );
    }

    function GetQualityInCart()
    {
        if (!isset($_SESSION["accountTMP"])) {

            if (!isset($_SESSION['Cart'])) {
                $lengthCart = 0;
                echo $lengthCart;
                exit;
            }

            $carts = json_decode($_SESSION['Cart'], true);

            $count = 0;

            if (isset($carts)) {
                foreach ($carts as $key => $value) {
                    $count += $value;
                }
            }
            echo $count;
        } else {
            // lấy userID từ $_SESSION['accountTMP'][0];
            $userID = $_SESSION['accountTMP'][0];
            // check xem user này đã có cart chưa nếu chưa thì tạo cho người đó một cart trong csdl
            $this->CheckCartExist($userID);
            // bắt đầu lấy số lượng sản sản phẩm có trong cart của user đó 
            $CheckCartExist = $this->CartModel->CheckCartExist($userID);
            $result_CheckCartExist = mysqli_fetch_array($CheckCartExist, MYSQLI_ASSOC);
            $GetQualityInCart = $this->CartModel->GetQualityInCart($result_CheckCartExist['Id']);
            $result_GetQualityInCart = mysqli_fetch_array($GetQualityInCart, MYSQLI_ASSOC);
            $total_quantity = $result_GetQualityInCart['record_count'];
            // kiểm tra và cho ra số lượng 
            if ($total_quantity === null) {
                echo '0';
            } else {
                echo $total_quantity;
            }
        }
    }

    function CheckCartExist($userID)
    {

        $CheckCartExist = $this->CartModel->CheckCartExist($userID);

        if (!mysqli_num_rows($CheckCartExist)) {
            $this->CartModel->CreatCart($userID);
        }
    }

    function checkAccountExists()
    {
        if (isset($_SESSION['accountTMP'])) {
            echo json_encode($_SESSION['accountTMP']);
        } else {
            echo json_encode(null);
        }
    }
}
