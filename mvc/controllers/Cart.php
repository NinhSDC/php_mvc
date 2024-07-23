<?php 
class Cart extends Controller
{   
    public $CartModel;
    public $ProductModel;
    public function __construct()
    {
        $this->CartModel = $this->Model("CartModel");
        $this->ProductModel = $this->Model("ProductModel");
    }
    function index(){
        $this -> DeleteUpdateTransactionIdSESSION();
        $this -> DeleteInfSubmitPaySESSION();
        if(!isset($_SESSION['Cart'])) {
            $_SESSION['Cart'] = '';
        }

        if(!isset($_SESSION["accountTMP"])) {
            $length = 0 ;
        }else{
            $length = count($_SESSION["accountTMP"]);
        }

        if($length == 4 ) {
            
            if(!isset($_SESSION['accountTMP'])) {
                header('location: /MVC_LUANVAN/login');
            }
            $CustomerId = $_SESSION['accountTMP'][0];
            
            $CheckCartExist = $this->CartModel->CheckCartExist($CustomerId);

            if (!sqlsrv_has_rows($CheckCartExist)) {
                $CreatCart = $this->CartModel->CreatCart($CustomerId);
            }

            $CheckCartExist = $this->CartModel->CheckCartExist($CustomerId);//lâp lại 1 lần nữa checkcart để lấy ID cart 

            $result_CheckCartExist = mysqli_fetch_array($CheckCartExist, MYSQLI_ASSOC);
        
            $this -> View(
                "CartView", [
                "page"=>"CartDetailView",
                "GetCart" => $this->CartModel->GetCart($result_CheckCartExist['Id']),
                ]
            );
            
        }elseif( $length == 0 ) {
            
            $carts = json_decode($_SESSION['Cart'], true);

            $ProductIds = array();
            $listcartModel = array();

            if(isset($carts)) {
                foreach ($carts as $key => $value) {
                    $getProductTMP = $this -> ProductModel -> GetInfProduct($key);

                    $result_getProductTMP = mysqli_fetch_array($getProductTMP, MYSQLI_ASSOC);

                    $PromotionPrice = $result_getProductTMP['price'] != null ?
                                         $result_getProductTMP['price'] - ($result_getProductTMP['price'] * $result_getProductTMP['stock'] /100) :
                                      $result_getProductTMP['price'];  

                    $listcartModel[$key] = array(
                    'ProductId' => $result_getProductTMP['Id'],
                    'nameProduct' => $result_getProductTMP['productName'],
                    'Path' => $result_getProductTMP['Path'],
                    'quantity' => $value,
                    'price' => $PromotionPrice,
                    );
                }
            }
            
            $this -> View(
                "CartView", [
                "page"=>"CartDetailStaffView",
                'dataModels' => $listcartModel,
                ]
            );

        }
    }
    function addToCart()
    {
        if(isset($_POST['quantityProduct'])) {
            $quantityAddToCart = $_POST['quantityProduct'];
        }else{
            $quantityAddToCart = 1; 
        }
        if(!isset($_SESSION["accountTMP"])) {
            $length = 0 ;
        }else{
            $length = count($_SESSION["accountTMP"]);
        }

        if($length ==4)
        {
            if (isset($_POST['productId'])) 
            {
                $ProductId = $_POST["productId"];
                $UserId = $_POST["userId"];
                $QuantityProductTMP = $_POST['quantityProduct'];
               
                $CheckCartExist = $this->CartModel->CheckCartExist($UserId);

                if (!sqlsrv_has_rows($CheckCartExist)) {
                    $CreatCart = $this->CartModel->CreatCart($UserId);
                }

                $CheckCartExist = $this->CartModel->CheckCartExist($UserId);//lâp lại 1 lần nữa checkcart để lấy ID cart 

                $result_CheckCartExist = mysqli_fetch_array($CheckCartExist, MYSQLI_ASSOC);
               
                $GetProductInCart = $this->CartModel->GetProductInCart($result_CheckCartExist['Id'], $ProductId);
          
                if(mysqli_num_rows($GetProductInCart) > 0) {
               
                    $QuantityProductSimple =  $QuantityProductTMP ;
                
                    $this->CartModel->CreatCartDetail(
                        $result_CheckCartExist['Id'],
                        $ProductId,
                        $QuantityProductSimple
                    );
                }else{
                
                    $result_GetProductInCart = mysqli_fetch_array($GetProductInCart, MYSQLI_ASSOC);

                    $QuantityProduct = $QuantityProductTMP + $result_GetProductInCart['Quantity'];

                    $this->CartModel->UpdateCartDetail(
                        $result_CheckCartExist['Id'],
                        $ProductId,
                        $QuantityProduct,
                    );
                }
            }
        }elseif($length == 0)
        {  
            $ProductId = $_POST["productId"];

            if(!isset($_SESSION['Cart'])) {
                $_SESSION['Cart'] = '';
            }

            $carts = json_decode($_SESSION['Cart'], true);
        
            if(isset($carts[$ProductId])) {
                $carts[$ProductId] += $quantityAddToCart;
            }
            else{
                $carts[$ProductId] = $quantityAddToCart;
            }

            $_SESSION["Cart"] = json_encode($carts);
        }
    }
    function delProductToCart()
    {
        if(!isset($_SESSION["accountTMP"])) {
            $length = 0 ;
        }else{
            $length = count($_SESSION["accountTMP"]);
        }
        
        if($length == 7 || $length == 0  ) {

            $ProductId = $_POST['productId'];
            
            $carts = json_decode($_SESSION['Cart'], true);

            if(isset($carts[$ProductId])) {
                unset($carts[$ProductId]);
                $_SESSION["Cart"] = json_encode($carts);
            }

            echo $ProductId;

            
        }else{
            if($_POST['productId']) {
                $IdCartDetail = $_POST['productId'];
                $CustomerId = $_SESSION['accountTMP'][0];

                $CheckCartExist = $this->CartModel->CheckCartExist($CustomerId);

                $result_CheckCartExist = sqlsrv_fetch_array($CheckCartExist, SQLSRV_FETCH_ASSOC);

                $IdCart =  $result_CheckCartExist['Id'];
            
                if (!$IdCart === null|| !empty($IdCart)) {

                    $DelProductToCart = $this->CartModel->DelProductToCart($IdCart, $IdCartDetail);
                
                    echo "success";
           
                }

            }
        }
            
    }
    function DeleteUpdateTransactionIdSESSION()
    {
            unset($_SESSION['UpdateTransactionId']);
    }
    function DeleteInfSubmitPaySESSION()
    {
           unset($_SESSION['InfSubmitPay']);
    }
    function DeleteCartSESSION()
    {
         // Lấy dữ liệu từ biến $_SESSION['Cart']
         $cartData = $_SESSION['Cart'];

         // Chuyển đổi chuỗi JSON thành mảng trong PHP
         $cartArray = json_decode($cartData, true);

         // Xóa dữ liệu bên trong mảng (giữ lại biến Cart)
         $cartArray = array();
                        
         // Chuyển đổi mảng thành chuỗi JSON và cập nhật biến $_SESSION['Cart']
         $_SESSION['Cart'] = json_encode($cartArray);
    }
}
?>
