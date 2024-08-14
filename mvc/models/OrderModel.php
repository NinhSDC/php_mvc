<?php
class OrderModel extends DB
{
    function getAllOrder()
    {
        $sql = "SELECT *
                FROM orders o
                WHERE o.status < 3 ";
        $query = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $result;
    }
}
