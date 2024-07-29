<?php
class User extends Controller 
{
    public $UserModel;
    public function __construct()
    {
        $this -> UserModel = $this->Model('UserModel');
    }
    
    function index()
    {
        $this -> DeleteUpdateTransactionIdSESSION();
        $this -> DeleteInfSubmitPaySESSION();
        if(!isset($_SESSION['accountTMP'])) {
            header('location: /php_mvc/Login');
        }
        $IdUser = trim($_SESSION['accountTMP'][0]);
       
        $this->View(
            "UserView", [
            "page"=>"infoUserView",
            "getInfoCustomer" => $this->UserModel->getInfoCustomer($IdUser),
            ]
        );
        
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
?>