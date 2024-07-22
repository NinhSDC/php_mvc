<?php
class RegisterModel extends DB
{

    function AddUser($Name, $Email, $Password, $createdDate)
    {
        $sql = "INSERT INTO `users` (`username`, `password`, `email`, `createdDate`)
            VALUES ('$Name', '$Password', '$Email', '$createdDate')";
        return mysqli_query($this->conn, $sql);
    }
    function CheckUser($Email)
    {
        $sql = "SELECT * FROM users WHERE email = '$Email'";
        return mysqli_query($this->conn, $sql);
    }
    function getInfoRole($roleName)
    {
        $sql = "SELECT * FROM roles WHERE roleName = '$roleName'";
        return mysqli_query($this->conn, $sql);
    }

    function addRoleUser($userId, $roleId)
    {
        $sql = " INSERT INTO  userrole (userID , roleID) VALUES ('$userId' , '$roleId')";
        return mysqli_query($this->conn, $sql);
    }

}
?>