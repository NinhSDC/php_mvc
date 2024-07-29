<?php
class Cart extends Controller
{
    public $CartModel;
    public $ProductsModel;
    public function __construct()
    {
        $this->CartModel = $this->Model("CartModel");
        $this->ProductsModel = $this->Model("ProductsModel");
    }
    function index()
    {
        $this->DeleteUpdateTransactionIdSESSION();
        $this->DeleteInfSubmitPaySESSION();
        if (!isset($_SESSION['Cart'])) {
            $_SESSION['Cart'] = '';
        }

        if (!isset($_SESSION["accountTMP"])) {
            $length = 0;
        } else {
            $length = count($_SESSION["accountTMP"]);
        }

        if ($length == 4) {

            $CustomerId = $_SESSION['accountTMP'][0];

            $CheckCartExist = $this->CartModel->CheckCartExist($CustomerId);
            //nếu chưa tồn tại cart thì sẽ tạo cart
            if (mysqli_num_rows($CheckCartExist) == 0) {
                $this->CartModel->CreatCart($CustomerId);
            }
            //lâp lại 1 lần nữa checkcart để lấy ID cart 
            $CheckCartExist = $this->CartModel->CheckCartExist($CustomerId);

            $result_CheckCartExist = mysqli_fetch_array($CheckCartExist, MYSQLI_ASSOC);

            $this->View(
                "CartView",
                [
                    "page" => "CartDetailView",
                    "GetCart" => $this->CartModel->GetCart($result_CheckCartExist['Id']),
                ]
            );
        } elseif ($length == 0) {

            $carts = json_decode($_SESSION['Cart'], true);

            $ProductIds = array();
            $listcartModel = array();

            if (isset($carts)) {
                foreach ($carts as $key => $value) {
                    $getProductTMP = $this->ProductsModel->GetInfProduct($key);

                    $result_getProductTMP = mysqli_fetch_array($getProductTMP, MYSQLI_ASSOC);

                    $PromotionPrice = ($result_getProductTMP['percent'] != null && $result_getProductTMP['percent'] > 0) ?
                        $result_getProductTMP['price'] - ($result_getProductTMP['price'] * $result_getProductTMP['percent'] / 100) :
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

            $this->View(
                "CartView",
                [
                    "page" => "CartDetailStaffView",
                    'dataModels' => $listcartModel,
                ]
            );
        }
    }

    function addToCart()
    {
        if (isset($_POST['quantityProduct'])) {
            $quantityAddToCart = $_POST['quantityProduct'];
        } else {
            $quantityAddToCart = 1;
        }

        if (!isset($_SESSION["accountTMP"])) {
            $length = 0;
        } else {
            $length = count($_SESSION["accountTMP"]);
        }

        if ($length == 4) {
            if (isset($_POST['productId'])) {
                $ProductId = $_POST["productId"];
                $UserId = $_POST["userId"];
                //echo $UserId ;exit();
                $QuantityProductTMP = $_POST['quantityProduct'];

                $CheckCartExist = $this->CartModel->CheckCartExist($UserId);
                //nếu chưa tồn tại cart thì sẽ tạo cart
                if (mysqli_num_rows($CheckCartExist) == 0) {
                    echo '00';exit();
                    $this->CartModel->CreatCart($UserId);
                }
                echo '02';exit();

                //lâp lại 1 lần nữa checkcart để lấy ID cart 
                $CheckCartExist = $this->CartModel->CheckCartExist($UserId);

                $result_CheckCartExist = mysqli_fetch_array($CheckCartExist, MYSQLI_ASSOC);

                $GetProductInCart = $this->CartModel->GetProductInCart($result_CheckCartExist['Id'], $ProductId);

                if (mysqli_num_rows($GetProductInCart) > 0) {

                    $QuantityProductSimple =  $QuantityProductTMP;

                    $this->CartModel->CreatCartDetail(
                        $result_CheckCartExist['Id'],
                        $ProductId,
                        $QuantityProductSimple
                    );
                } else {

                    $result_GetProductInCart = mysqli_fetch_array($GetProductInCart, MYSQLI_ASSOC);

                    $QuantityProduct = $QuantityProductTMP + $result_GetProductInCart['Quantity'];

                    $this->CartModel->UpdateCartDetail(
                        $result_CheckCartExist['Id'],
                        $ProductId,
                        $QuantityProduct,
                    );
                }
            }
        } elseif ($length == 0) {
            $ProductId = $_POST["productId"];

            if (!isset($_SESSION['Cart'])) {
                $_SESSION['Cart'] = '';
            }

            $carts = json_decode($_SESSION['Cart'], true);

            if (isset($carts[$ProductId])) {
                $carts[$ProductId] += $quantityAddToCart;
            } else {
                $carts[$ProductId] = $quantityAddToCart;
            }

            $_SESSION["Cart"] = json_encode($carts);
        }
    }

    function updatesCartAndPay()
    {
        if (!isset($_SESSION["accountTMP"])) {
            $length = 0;
        } else {
            $length = count($_SESSION["accountTMP"]);
        }

        if ($length == 0) {

            $StaffId = 'null';
            $StoreId = 'null';
            $MoneyReceived = 0;
            $MoneyRefund = 0;
            $PaymentStatus = 0;
            $ShipStatus = 0;
        }

        if (isset($_POST['update_click'])) {

            $carts = json_decode($_SESSION['Cart'], true);

            if (isset($_POST['ProductId'])) {

                for ($i = 0; $i < count($_POST['ProductId']); $i++) {

                    $ProductId = $_POST["ProductId"][$i];
                    $Quantity = $_POST["Quantity"][$i];

                    if ($Quantity == 0) {
                        unset($carts[$ProductId]);
                    } elseif (isset($carts[$ProductId])) {
                        $carts[$ProductId] = $Quantity;
                    }
                }

                $_SESSION["Cart"] = json_encode($carts);
            }

            setcookie('SuccessTMP', "updatesCartSuccess", time() + 2);
            header('location: /php_mvc/Cart');
        }

        if (isset($_POST['order_click'])) {

            $carts = json_decode($_SESSION['Cart'], true);

            if ($carts === null || empty($carts)) {
                setcookie('SuccessTMP', "CartNull2", time() + 2);
                header('location: /php_mvc/Cart');
            }

            $ProductIds = array();
            $listcartModel = array();

            if (isset($carts)) {
                foreach ($carts as $key => $value) {
                    $getProductTMP = $this->ProductsModel->GetInfProduct($key);

                    $result_getProductTMP = mysqli_fetch_array($getProductTMP, MYSQLI_ASSOC);

                    $PromotionPrice = ($result_getProductTMP['percent'] != null && $result_getProductTMP['percent'] > 0) ?
                        $result_getProductTMP['price'] - ($result_getProductTMP['price'] * $result_getProductTMP['percent'] / 100) :
                        $result_getProductTMP['price'];

                    $listcartModel[$key] = array(
                        'nameProduct' => $result_getProductTMP['productName'],
                        'Path' => $result_getProductTMP['Path'],
                        'quantity' => $value,
                        'price' => $PromotionPrice,
                    );
                }
            }

            $this->View(
                "CartView",
                [
                    "page" => "InfoOrderStaffView",
                    "GetCartSession" => $listcartModel
                ]
            );
        }

        if (isset($_POST['Submit_Pay'])) {

            $CustomerId = 'null';
            $CustomerName = $_POST['NameOrder'];
            $PhoneNumber = $_POST['PhoneNumber'];
            $Email = $_POST['Email'];
            $Address = $_POST['Address'];
            $Note = 'null';
            $PaymentMethod = $_POST['PaymentMethod'];
            $TmpTotal = $_POST['total_all_addVoucher'];
            $Total = $_POST['total_all_addVoucher'];
            $CreatedTime = 'getdate()';
            $LastUpdated = 'getdate()';

            if (isset($_POST['PaymentMethod']) && $_POST['PaymentMethod'] == 'COD') {

                $ProductWarehouseId = 'null';

                $CreateOrder = $this->CartModel->CreateOrder(
                    $CustomerId,
                    $CustomerName,
                    $PhoneNumber,
                    $Email,
                    $Address,
                    $Note,
                    $PaymentMethod,
                    $TmpTotal,
                    $Total,
                    $StaffId,
                    $StoreId,
                    $ShipStatus,
                    $PaymentStatus,
                    $CreatedTime,
                    $LastUpdated
                );
                if ($CreateOrder != null) {

                    $OrderId  = $CreateOrder;

                    for ($i = 0; $i < count($_POST['ProductId']); $i++) {
                        $ProductId = $_POST['ProductId'][$i];
                        $Path = $_POST['Path'][$i];
                        $ProductName = $_POST['ProductName'][$i];
                        $Quantity = $_POST['Quantity'][$i];
                        $ProducPrice = $_POST['ProducPrice'][$i];
                        if ($ProducPrice != "" && $ProductId != "" && $Quantity != "") {
                            $CreateOrderDetail = $this->CartModel->CreateOrderDetail(
                                $OrderId,
                                $ProductId,
                                $Path,
                                $ProductName,
                                $Quantity,
                                $ProducPrice,
                                $CreatedTime,
                                $LastUpdated,
                                $ProductWarehouseId
                            );
                        }

                        $Completed = true;
                    }

                    if ($Completed === true) {

                        $StatusPay = 0;
                        $CreateBill = $this->CartModel->CreateBill($OrderId, $Total, $MoneyReceived, $MoneyRefund, $CreatedTime, $StatusPay);

                        $checkStatusPayBill = $this->CartModel->checkStatusPayBill($OrderId);

                        $result_checkStatusPayBill = mysqli_fetch_array($checkStatusPayBill);

                        $PaymentStatus = $result_checkStatusPayBill['StatusPay'];

                        $_SESSION['ShowBill'] = [$OrderId, $CustomerName, $PhoneNumber, $Address, $PaymentMethod, $PaymentStatus];

                        $this->DeleteCartSESSION();

                        $this->DeleteUpdateTransactionIdSESSION();

                        header('location: /php_mvc/Cart/ShowBill');
                    }
                }
            } elseif (isset($_POST['PaymentMethod']) && $_POST['PaymentMethod'] == 'VNPAY') {

                if ($length == 0) {

                    $PaymentMethod =  $_POST['PaymentMethod'];

                    $ProductWarehouseId = 'null';

                    $CreateOrder = $this->CartModel->CreateOrder(
                        $CustomerId,
                        $CustomerName,
                        $PhoneNumber,
                        $Email,
                        $Address,
                        $Note,
                        $PaymentMethod,
                        $TmpTotal,
                        $Total,
                        $StaffId,
                        $StoreId,
                        $ShipStatus,
                        $PaymentStatus,
                        $CreatedTime,
                        $LastUpdated
                    );
                    if ($CreateOrder != null) {

                        $TransactionStatus = $PaymentStatus;
                        $TransactionId = 0;
                        $BankName = "NCB";
                        $Price = $Total;
                        $DateTimePayment = $CreatedTime;
                        $OrderId  = $CreateOrder;

                        for ($i = 0; $i < count($_POST['ProductId']); $i++) {
                            $ProductId = $_POST['ProductId'][$i];
                            $Path = $_POST['Path'][$i];
                            $ProductName = $_POST['ProductName'][$i];
                            $Quantity = $_POST['Quantity'][$i];
                            $ProducPrice = $_POST['ProducPrice'][$i];
                            if ($ProducPrice != "" && $ProductId != "" && $Quantity != "") {
                                $CreateOrderDetail = $this->CartModel->CreateOrderDetail(
                                    $OrderId,
                                    $ProductId,
                                    $Path,
                                    $ProductName,
                                    $Quantity,
                                    $ProducPrice,
                                    $CreatedTime,
                                    $LastUpdated,
                                    $ProductWarehouseId
                                );
                            } else {
                                $Completed = true;
                            }
                        }
                        if ($PaymentMethod === "VNPAY") {
                            $_SESSION['InfSubmitPay'] = [$Total, $OrderId];

                            if ($Completed = true) {

                                $CreateVNPAY = $this->CartModel->CreateVNPAY($OrderId, $BankName, $TransactionId, $TransactionStatus, $Price, $DateTimePayment);

                                $GetIdCart = $this->CartModel->GetIdCart($CustomerId);

                                $result_GetIdCart = mysqli_fetch_array($GetIdCart, MYSQLI_ASSOC);

                                $CartId = $result_GetIdCart['Id'];

                                $DeleteCartDetail = $this->CartModel->DeleteCartDetail($CartId);

                                $checkTransactionStatusVNPAY = $this->CartModel->checkTransactionStatusVNPAY($OrderId);

                                $result_checkTransactionStatusVNPAY = mysqli_fetch_array($checkTransactionStatusVNPAY);

                                $PaymentStatus = $result_checkTransactionStatusVNPAY['TransactionStatus'];

                                $_SESSION['ShowVNPAY'] = [$OrderId, $CustomerName, $PhoneNumber, $Address, $PaymentMethod, $PaymentStatus];

                                $this->DeleteCartSESSION();

                                $this->DeleteUpdateTransactionIdSESSION();

                                header('location: /php_mvc/vnpay_php/vnpay_pay.php');
                            } else {
                                echo 'tu tu sua';
                                setcookie('errorCompleted', "errorCompleted", time() + 2);
                                header('location: /php_mvc/Cart/ShowBill');
                                die();
                            }
                        }
                    }
                } else {
                    $WareHouseId = $_SESSION['accountTMP'][3];

                    $PaymentMethod =  $_POST['PaymentMethod'];

                    $CreateOrder = $this->CartModel->CreateOrder(
                        $CustomerId,
                        $CustomerName,
                        $PhoneNumber,
                        $Email,
                        $Address,
                        $Note,
                        $PaymentMethod,
                        $TmpTotal,
                        $Total,
                        $StaffId,
                        $StoreId,
                        $ShipStatus,
                        $PaymentStatus,
                        $CreatedTime,
                        $LastUpdated
                    );
                    if ($CreateOrder != null) {

                        $TransactionStatus = $PaymentStatus;
                        $TransactionId = 0;
                        $BankName = "NCB";
                        $Price = $Total;
                        $DateTimePayment = $CreatedTime;
                        $OrderId  = $CreateOrder;

                        for ($i = 0; $i < count($_POST['ProductId']); $i++) {
                            $ProductId = $_POST['ProductId'][$i];
                            $Path = $_POST['Path'][$i];
                            $ProductName = $_POST['ProductName'][$i];
                            $Quantity = $_POST['Quantity'][$i];
                            $ProducPrice = $_POST['ProducPrice'][$i];
                            if ($ProducPrice != "" && $ProductId != "" && $Quantity != "") {

                                $getProductWareHousesId = $this->CartModel->getProductWareHousesId($ProductId, $WareHouseId);

                                $result_getProductWareHousesId = mysqli_fetch_array($getProductWareHousesId, MYSQLI_ASSOC);

                                $ProductWarehouseId =   $result_getProductWareHousesId['Id'];

                                $CreateOrderDetail = $this->CartModel->CreateOrderDetail(
                                    $OrderId,
                                    $ProductId,
                                    $Path,
                                    $ProductName,
                                    $Quantity,
                                    $ProducPrice,
                                    $CreatedTime,
                                    $LastUpdated,
                                    $ProductWarehouseId
                                );

                                $getQuantityWareHouses = $this->CartModel->getQuantityWareHouses($ProductId, $WareHouseId);

                                $result_getQuantityWareHouses = mysqli_fetch_array($getQuantityWareHouses, MYSQLI_ASSOC);

                                if ($result_getQuantityWareHouses != false) {
                                    $QuantityTMP1 = $result_getQuantityWareHouses['Quantity'];
                                    $QuantityTMP = $QuantityTMP1 - $Quantity;
                                } else {
                                    echo 'loivl';
                                    exit;
                                }

                                $updateQuantityOrderDetail = $this->CartModel->updateQuantityOrderDetail($ProductId, $WareHouseId, $QuantityTMP);
                            } else {
                                $Completed = true;
                            }
                        }
                        if ($PaymentMethod === "VNPAY") {

                            $_SESSION['InfSubmitPay'] = [$Total, $OrderId];

                            if ($Completed = true) {

                                $CreateVNPAY = $this->CartModel->CreateVNPAY($OrderId, $BankName, $TransactionId, $TransactionStatus, $Price, $DateTimePayment);

                                $_SESSION['ShowVNPAY'] = [$OrderId, $CustomerName, $PhoneNumber, $Address, $PaymentMethod];

                                $this->DeleteCartSESSION();

                                header('location: /php_mvc/vnpay_php/vnpay_pay.php');
                            } else {
                                echo 'tu tu sua';
                                setcookie('errorCompleted', "errorCompleted", time() + 2);
                                header('location: /php_mvc/Cart/ShowBill');
                                die();
                            }
                        }
                    }
                }
            } elseif (isset($_POST['PaymentMethod']) && $_POST['PaymentMethod'] == 'DIRECT') {

                $WareHouseId = $_SESSION['accountTMP'][3];
                $CreateOrder = $this->CartModel->CreateOrder(
                    $CustomerId,
                    $CustomerName,
                    $PhoneNumber,
                    $Email,
                    $Address,
                    $Note,
                    $PaymentMethod,
                    $TmpTotal,
                    $Total,
                    $StaffId,
                    $StoreId,
                    $ShipStatus,
                    $PaymentStatus,
                    $CreatedTime,
                    $LastUpdated
                );

                if ($CreateOrder != null) {

                    $OrderId  = $CreateOrder;

                    for ($i = 0; $i < count($_POST['ProductId']); $i++) {
                        $ProductId = $_POST['ProductId'][$i];
                        $Path = $_POST['Path'][$i];
                        $ProductName = $_POST['ProductName'][$i];
                        $Quantity = $_POST['Quantity'][$i];
                        $ProducPrice = $_POST['ProducPrice'][$i];

                        if ($ProducPrice != "" && $ProductId != "" && $Quantity != "") {

                            $getProductWareHousesId = $this->CartModel->getProductWareHousesId($ProductId, $WareHouseId);

                            $result_getProductWareHousesId = mysqli_fetch_array($getProductWareHousesId, MYSQLI_ASSOC);

                            $ProductWarehouseId =   $result_getProductWareHousesId['Id'];

                            $CreateOrderDetail = $this->CartModel->CreateOrderDetail(
                                $OrderId,
                                $ProductId,
                                $Path,
                                $ProductName,
                                $Quantity,
                                $ProducPrice,
                                $CreatedTime,
                                $LastUpdated,
                                $ProductWarehouseId,
                            );

                            $getQuantityWareHouses = $this->CartModel->getQuantityWareHouses($ProductId, $WareHouseId);

                            $result_getQuantityWareHouses = mysqli_fetch_array($getQuantityWareHouses, MYSQLI_ASSOC);

                            if ($result_getQuantityWareHouses != false) {
                                $QuantityTMP1 = $result_getQuantityWareHouses['Quantity'];
                                $QuantityTMP = $QuantityTMP1 - $Quantity;
                            } else {
                                echo 'loivl';
                                exit;
                            }

                            $updateQuantityOrderDetail = $this->CartModel->updateQuantityOrderDetail($ProductId, $WareHouseId, $QuantityTMP);
                        }
                        $Completed = true;
                    }

                    if ($Completed === true) {

                        $MoneyReceived = trim($_POST['MoneyReceived']);
                        $MoneyRefund = trim($_POST['MoneyRefund']);

                        $StatusPay = 1;

                        $CreateBillDirect = $this->CartModel->CreateBill($OrderId, $Total, $MoneyReceived, $MoneyRefund, $CreatedTime, $StatusPay);

                        $checkStatusPayBill = $this->CartModel->checkStatusPayBill($OrderId);

                        $result_checkStatusPayBill = mysqli_fetch_array($checkStatusPayBill);

                        $PaymentStatus = $result_checkStatusPayBill['StatusPay'];

                        $_SESSION['ShowBill'] = [$OrderId, $CustomerName, $PhoneNumber, $Address, $PaymentMethod, $PaymentStatus];

                        $this->DeleteCartSESSION();

                        if ($CreateBillDirect !== false) {

                            $this->DeleteUpdateTransactionIdSESSION();

                            header('location: /php_mvc/Cart/ShowBill');
                        }
                    }
                }
            }
        }
    }

    function delProductToCart()
    {
        if (!isset($_SESSION["accountTMP"])) {
            $length = 0;
        } else {
            $length = count($_SESSION["accountTMP"]);
        }

        if ($length == 7 || $length == 0) {

            $ProductId = $_POST['productId'];

            $carts = json_decode($_SESSION['Cart'], true);

            if (isset($carts[$ProductId])) {
                unset($carts[$ProductId]);
                $_SESSION["Cart"] = json_encode($carts);
            }

            echo $ProductId;
        } else {
            if ($_POST['productId']) {
                $IdCartDetail = $_POST['productId'];
                $CustomerId = $_SESSION['accountTMP'][0];

                $CheckCartExist = $this->CartModel->CheckCartExist($CustomerId);

                $result_CheckCartExist = mysqli_fetch_array($CheckCartExist, MYSQLI_ASSOC);

                $IdCart =  $result_CheckCartExist['Id'];

                if (!$IdCart === null || !empty($IdCart)) {

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
