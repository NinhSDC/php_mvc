<?php
class Login extends Controller
{
    public $LoginModel;
    public function __construct()
    {
        $this->LoginModel = $this->Model("LoginModel");
    }

    function index()
    {
        // kiểm tra nếu tồn tại session accountTMP thì nó xóa session đó 
        if (isset($_SESSION['accountTMP'])) {
            session_destroy();
        }
        // nếu nhận được nút bấm đăng nhập thì nó gửi biến post submit
        // bắt đầu kiểm tra thông tin tài khoản
        if (isset($_POST['submit'])) {
            $User = $_POST['username'];
            $Pass = $_POST['password'];

            $CheckUser = $this->LoginModel->checkUser($User);
            // kiểm tra đầu tiên là câu truy vấn có lỗi không nếu lỗi sẽ set erro cho nó là lỗi hệ thống    
            if ($CheckUser === false) {
                setcookie('error', "errorSystem", time() + 1);
                header('location: /php_mvc/Login');
                die();
            } else {

                $result_CheckUser = mysqli_fetch_array($CheckUser, MYSQLI_ASSOC);
                // kiểm tra tài khoản có tồn tại không nếu không thì trả lỗi account null
                if ($result_CheckUser === null) {
                    setcookie('error', "AccountNULL", time() + 1);
                    header('location: /php_mvc/Login');
                    die();

                } else {

                    $login = $this->LoginModel->GetInfoUser($User);

                    if ($login->num_rows < 0) {
                        setcookie('error', "AccountFalse", time() + 1);
                        header('location: /php_mvc/Login');
                        die();

                    } else {
                        // Người dùng tồn tại
                        $result_login = mysqli_fetch_array($login,  MYSQLI_ASSOC);  
                        $hashed_password = $result_login['password'];
                        // Xác minh mật khẩu
                        if (password_verify($Pass, $hashed_password)) {
                            // bắt đàu tạo session ['accountTMP']
                           echo $result_login['Id'];
                           echo $hashed_password;
                            $_SESSION["accountTMP"] = [
                                $result_login['Id'],
                                $result_login['roleName'],
                                $result_login['username'],
                                $result_login['email']
                            ];
                            header('location: /php_mvc/');
                        } 
                        else {
                            setcookie('error', "AccountFalse", time() + 1);
                            header('location: /php_mvc/Login');
                            die();
                        }
                    }
                }
            }

        }

        $this->View(
            "LoginView",
            []
        );
    }
}
