<?php
class AdminModel extends DB
{
    function NumberOrders()
    {
        $sql = "SELECT COUNT(*) AS NumberOrders 
        FROM orders ";
        $query = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $result;
    }
}
