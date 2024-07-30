<?php
class UserModel extends DB
{
    function getInfoCustomer($userID)
    {
        $sql = "SELECT *
        FROM Users
        WHERE id = '$userID' ";
        return mysqli_query($this->conn, $sql);
    }

    function updateImg($fileName, $userID)
    {
        $sql = "UPDATE `Users` 
                SET `Id`='$fileName',
                `img`='$fileName'";
        return mysqli_query($this->conn, $sql);
    }
}
