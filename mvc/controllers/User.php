<?php
class User extends Controller
{
    public $UserModel;
    public function __construct()
    {
        $this->UserModel = $this->Model('UserModel');
    }

    function index()
    {
        $this->DeleteUpdateTransactionIdSESSION();
        $this->DeleteInfSubmitPaySESSION();
        if (!isset($_SESSION['accountTMP'])) {
            header('location: /php_mvc/Login');
        }
        $IdUser = trim($_SESSION['accountTMP'][0]);

        $this->View(
            "UserView",
            [
                "page" => "infoUserView",
                "getInfoCustomer" => $this->UserModel->getInfoCustomer($IdUser),
            ]
        );
    }

    function updateImg()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $target_dir = "../public/Assets/img/imgUsers/"; // Thư mục để lưu trữ file upload
            $file_name = basename($_FILES["file"]["name"]);
            $target_file = $target_dir . $file_name;
            $userId = $_POST['userId'];

            echo '231';
            exit();

            // Kiểm tra loại file
            $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_extensions = ['png', 'jpg', 'jpeg'];

            if (in_array($file_extension, $allowed_extensions)) {
                // Kiểm tra và di chuyển file tới thư mục đích
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    // Cập nhật tên file vào cơ sở dữ liệu
                    $this->UserModel->updateImg($file_name, $userId);
                }
            }
        }
    }

    function InfoOrder($current_page = 1)
    {

        $IdUser = trim($_SESSION['accountTMP'][0]);

        $checkOrder = $this->UserModel->checkOrder($IdUser);

        $result_checkOrder = mysqli_fetch_array($checkOrder);

        $checkOrderExist = $result_checkOrder['checkOrder'];

        $limit = 5;

        $total_records = $this->UserModel->getCountOrders($IdUser);

        $total_page = ceil($total_records / $limit);

        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;

        $this->View(
            "UserView",
            [
                "page" => "infoOrderUserView",
                "checkOrder" => $checkOrderExist,
                "getInfoCustomer" => $this->UserModel->getInfoCustomer($IdUser),
                "getOrderInfoUser" => $this->UserModel->getOrderInfoUser($IdUser, $start, $limit),
                "currentPage" => $current_page,
                "totalPage" => $total_page
            ]
        );
    }

    public function OrderDetail($id)
    {
        $CustomerId = $_SESSION['accountTMP'][0];

        $OrderDetail = $this->UserModel->getOrderDetailInfoUser($id);

        $getTotalOrder = $this->UserModel->getTotalOrder($id);

        $result_getTotalOrder = mysqli_fetch_array($getTotalOrder, MYSQLI_ASSOC);

        echo "<table>
        <tr class='UserInfo_Order_right_tr_DetailOrder'>
            <th>Mã Sản Phẩm</th>
            <th></th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Giá Sản Phẩm</th>
            <th>Thành Tiền</th>
        <tr>";

        while ($row = mysqli_fetch_array($OrderDetail)) {
            $PriceProduct = $row["price"];
            $Quantity = $row["quantity"];
            $TotalPriceProduct = $PriceProduct * $Quantity;
            echo "
             <tr class='UserInfo_Order_right_tr_DetailOrder'>
                    <th>" . $row["productID"] . "</th>
                    <th><img height='100px' width='100px' src='" . $row["img"] . "' > </th>
                    <th><a href='/php_mvc/Product/ProductDetail/" . $row["productID"] . "'>" . $row["productName"] . "</a></th>
                    <th >" . $Quantity . "</th>
                    <th >" . number_format($PriceProduct, 0, ',', '.') . '₫' . "</th>
                    <th >" . number_format($TotalPriceProduct, 0, ',', '.') . '₫' . "</th>
                </tr>
            ";
        }

        echo  "</table";

        echo "<table>
        <tr class='UserInfo_Order_right_tr_DetailOrder'>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Thành Tiền : </th>
            <th style='color:red;' >" . number_format($result_getTotalOrder["Total"], 0, ',', '.') . '₫' . "</th>
        <tr>";
        echo  "</table";
        echo $result_getTotalOrder["Total"];
    }

    function DeleteUpdateTransactionIdSESSION()
    {
        unset($_SESSION['UpdateTransactionId']);
    }

    function DeleteInfSubmitPaySESSION()
    {
        unset($_SESSION['InfSubmitPay']);
    }
}
