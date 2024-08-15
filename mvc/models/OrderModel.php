<?php
class OrderModel extends DB
{
    function GetAllOrder($skip = 0, $take = 4)
    {
        $sql = "SELECT *
                FROM orders o
                WHERE o.status < 3 
                Order By Id desc
                LIMIT $skip, $take;";
        $query = mysqli_query($this->conn, $sql);
        // Tạo một mảng để chứa toàn bộ kết quả
        $result = [];

        // Dùng vòng lặp để lấy tất cả các dòng kết quả
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    function GetCountOrders()
    {
        $sql = "SELECT COUNT(*) as number
        FROM orders o
        WHERE o.status < 3 ";
        $query = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $result['number'];
    }

    function EditOrder($idOrder, $nameOrder, $phoneNumber, $email, $status)
    {
        $sql = "UPDATE `orders` 
            SET 
            `status`='$status',
            `email`='$email',
            `phoneNumber`='$phoneNumber',
            `nameOrder`='$nameOrder'
             WHERE Id = $idOrder";

        if (mysqli_query($this->conn, $sql)) {
            return true; // Update thành công
        } else {
            return false; // Update thất bại
        }
    }

    function infOrderId($IdOrder)
    {
        $sql = "SELECT * FROM `orders` WHERE Id = $IdOrder";
        $query = mysqli_query($this->conn, $sql);
        return mysqli_fetch_array($query, MYSQLI_ASSOC);
    }
}
