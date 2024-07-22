<?php
class Register extends Controller
{
    public $RegisterModel;

    public function __construct()
    {
        $this->RegisterModel = $this->Model("RegisterModel");
        //date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    function index (){

        if(isset($_POST['submit'])){
            $Name = $_POST['Name'];
            $Email = $_POST['Email'];
            $PasswordTMP = $_POST['password'];
            $ConfirmPassword = $_POST['ConfirmPassword'];

            $CheckUser = $this->RegisterModel->CheckUser($Email);
            // kiểm tra email đã được sử dụng cho tài khoản khác chưa 
            if (mysqli_num_rows($CheckUser) > 0) {
                setcookie('error', "AccountConsist", time() + 1);
                header('location: /php_mvc/Register');
                die();
            }
            elseif($PasswordTMP != $ConfirmPassword) {
                //kiểm tra mật khẩu với confirmpassword có giống nhau không 
                setcookie('error', "ConfirmPasswordError", time() + 1);
                header('location: /php_mvc/Register');
                die();
            }else {
                // Hash mật khẩu
                $hashed_password = password_hash($PasswordTMP, PASSWORD_DEFAULT);
                $createdDate = date('Y-m-d H:i:s');     

                $CreateUsers = $this->RegisterModel->AddUser($Name, $Email, $hashed_password , $createdDate);
                // kiểm tra trong quá trình AddUser có bị lỗi không 
                if ($CreateUsers === false) {
                    setcookie('error', "errorSystem", time() + 1);
                    header('location: /php_mvc/Register');
                    die();
                }else{
                    //sau khi addUser thành công thì bắt đàu add Role cho user đó 
                    //Lấy UserId
                    $getUserId = $this -> RegisterModel->CheckUser($Email);
                    $result_getUserId = mysqli_fetch_array($getUserId);
                    $userId = $result_getUserId['Id'];  
                    //Lấy RoleId
                    $roleCustomer = "Customer";
                    $getInfoRole = $this ->RegisterModel ->getInfoRole($roleCustomer); 
                    $result_getUserId = mysqli_fetch_array($getInfoRole, MYSQLI_ASSOC);
                    $roleId = $result_getUserId["Id"];
                    //add role cho user
                    $addRoleUser = $this ->RegisterModel ->addRoleUser($userId,$roleId ); 
                    if ($addRoleUser === false) {
                        setcookie('error', "errorAddRoleUser", time() + 1);
                        header('location: /php_mvc/Register');
                        die();
                    }else{
                        setcookie('success', "AccountSuccess", time() + 1);
                        header('location: /php_mvc/Login');
                        die();
                    }
                   
                }
            }
        }
        $this -> View(
            "RegisterView", [
            ]
        );
    }
}

?>