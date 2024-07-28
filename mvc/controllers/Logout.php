<?php
class Logout extends Controller
{
    public function __construct()
    {
        if ($_SESSION['accountTMP']) {
            session_destroy();
            header('location: /php_mvc/');
        }
        session_destroy();
        header('location: /php_mvc/');
    }
}
