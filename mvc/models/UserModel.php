<?php
class UserModel extends DB{
    function getInfoCustomer($userID)
    {
        $sql = "SELECT *
        FROM Users
        WHERE id = '$userID' ";
        return mysqli_query($this->conn, $sql);
    }
}
?>