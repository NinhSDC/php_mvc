<?php
class LoginModel extends DB
{
    function checkUser($email)
    {
        $sql = "SELECT email FROM users WHERE email ='$email'";
        return mysqli_query($this->conn, $sql);
    }
}
