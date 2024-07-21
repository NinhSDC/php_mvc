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
        if (isset($_SESSION['accountTMP'])) {
            session_destroy();
        }
        if (isset($_POST['submit'])) {
            $User = $_POST['username'];
            $Pass = $_POST['password'];
            $CheckUser = $this->LoginModel->checkUser($User);

            if ($CheckUser === false) {
                setcookie('error', "errorSystem", time() + 1);
                header('location: /php_mvc/Login');
                die();
            } else {
                $result_CheckUser = mysqli_fetch_array($CheckUser, SQLSRV_FETCH_ASSOC);
            }
        }

        $this->View(
            "LoginView",
            []
        );
    }
}
