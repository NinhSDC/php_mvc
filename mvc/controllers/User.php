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

    function DeleteUpdateTransactionIdSESSION()
    {
        unset($_SESSION['UpdateTransactionId']);
    }
    function DeleteInfSubmitPaySESSION()
    {
        unset($_SESSION['InfSubmitPay']);
    }
}
