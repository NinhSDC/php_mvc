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

    function checkOrder($IdUser)
    {
        $sql = "SELECT COUNT(*) AS checkOrder
                FROM orders
                WHERE orders.userID = '$IdUser'
                ";
        return mysqli_query($this->conn, $sql);
    }

    function getCountOrders($IdUser)
    {
        $sql = "SELECT COUNT(orders.Id)
                  FROM orders 
                  WHERE userID = '$IdUser' ";

        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_array($result)[0];
    }

    function getOrderInfoUser($IdUser, $skip = 0, $take = 10)
    {
        $sql = "SELECT
                orders.*,
                o.productID AS productId,
                p.path AS pathImg
            FROM
                orders
            LEFT JOIN orderDetail o ON orders.Id = o.orderID 
            LEFT JOIN productimages p ON p.productId = o.productID  
            WHERE
                orders.userID = '$IdUser' AND
                p.sortOrder = 1
            ORDER BY
                orders.Id
            LIMIT $skip, $take;";

        return mysqli_query($this->conn, $sql);
    }
}
