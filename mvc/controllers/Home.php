<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller
{
    public $CategoriesModel;
    public $ProductModel;
    public $CartModel;
    public $BrandModel;
    public $SearchModel;

    public function __construct()
    {
        $this->CategoriesModel = $this->Model("CategoriesModel");
        $this->ProductModel = $this->Model("ProductsModel");
        $this->CartModel = $this->Model("CartModel");
        $this->BrandModel = $this->Model("BrandModel");
        $this->SearchModel = $this->Model("SearchModel");
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

    function category($id, $sortedBy = 1, $current_page = 1)
    {
        $getCountProductsByCategoryId = $this->ProductModel->getCountProductsByCategoryId($id);

        $brands = $this->BrandModel->getAllBrands();

        $getBrandFilter = $this->BrandModel->getBrandFilter($id);

        $brandsFilter = [];
        if (isset($_POST["brands"])) {
            $brandsFilter = $_POST["brands"];
        }

        $limit = 8;

        // Tìm Start
        $start = ($current_page - 1) * $limit;

        $products = $this->BrandModel->getProductsByCategoryId($id, $start, $limit);

        $total_records = $getCountProductsByCategoryId;

        $total_page = ceil($total_records / $limit);

        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }


        $this->View(
            "SearchView",
            [
                "page" => "productInCategory",
                "currentPage" => $current_page,
                "totalPage" => $total_page,
                "products" => $products,
                "categoryId" => $id,
                "sortedBy" => $sortedBy,
                "brands" => $brands
            ]
        );
    }

    function Search()
    {
        if (isset($_POST['keySearch'])) {

            $keySearch = $_POST['keySearch'];

            $SearchProduct = $this->SearchModel->Search($keySearch);

            // $result_SearchProduct = sqlsrv_fetch_array($SearchProduct, SQLSRV_FETCH_ASSOC);

            if ($SearchProduct != false) {

                while ($row = mysqli_fetch_array($SearchProduct, MYSQLI_ASSOC)) {
                    $ProductId = $row['Id'];
                    $Path = $row['imageURL'];
                    $Name = $row['productName'];
                    echo "
                    <div class='Search_Result'>
                        <a href='/php_mvc/Product/ProductDetail/" . $ProductId . "' '>
                    <div class='Search_Result_Img'>
                        <img src='" . $Path . "' alt=''>
                    </div>
                    <div class='Search_Result_Content'>
                        <span> " . $Name . "</span>
                    </div>
                    </a>
                    </div>
                    ";
                }
            }
        }
    }
}
