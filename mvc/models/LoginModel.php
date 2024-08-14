<?php
class LoginModel extends DB
{
    function checkUser($email)
    {
        $sql = "SELECT email FROM users WHERE email ='$email'";
        return mysqli_query($this->conn, $sql);
    }

    function GetInfoUser($email)
    {
        $sql = "SELECT users.*,
            roles.roleName as roleName,
            roles.Id as rolesId
          FROM users 
          LEFT JOIN userrole ON userrole.userID = users.Id 
          LEFT JOIN roles ON roles.Id = userrole.roleId 
          WHERE email ='$email'";
        return mysqli_query($this->conn, $sql);
    }
}
