<?php
class UserModel extends DB
{

    function getInfoOrder($userID)
    {
        $sql = "SELECT orders.status AS status
        FROM orders
        WHERE userID = '$userID' ";
        return mysqli_query($this->conn, $sql);
    }

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

    function getOrderInfoUser($IdUser, $skip = 0, $take = 5)
    {
        $sql = "WITH OrderedDetails AS (
                    SELECT
                        od.*,
                        ROW_NUMBER() OVER (PARTITION BY od.orderID ORDER BY od.Id DESC) AS rn
                    FROM
                        orderDetail od
                )
                SELECT
                    orders.*,
                    o.productID AS productId,
                    p.path AS pathImg
                FROM
                    orders
                LEFT JOIN
                    (SELECT * FROM OrderedDetails WHERE rn = 1) o
                ON
                    orders.Id = o.orderID
                LEFT JOIN
                    productimages p
                ON
                    p.productId = o.productID
                    AND p.sortOrder = 1
                WHERE
                    orders.userID = '$IdUser'
                ORDER BY
                    orders.Id
                 LIMIT $skip, $take;";

        return mysqli_query($this->conn, $sql);
    }

    function getOrderDetailInfoUser($id)
    {
        $sql = "SELECT 
                orderDetail.*,
                productimages.path AS img,
                products.productName 
                 FROM orderDetail 
                 LEFT JOIN productimages ON productimages.productId = orderDetail.productID AND productimages.sortOrder = 1 
                 LEFT JOIN products ON products.Id = orderDetail.productID 
                 WHERE orderID = '$id'";
        return mysqli_query($this->conn, $sql);
    }

    function getTotalOrder($orderID)
    {
        $sql = "SELECT orders.totalAmount AS Total
                FROM orders 
                WHERE Id = '$orderID'";
        return mysqli_query($this->conn, $sql);
    }
}
