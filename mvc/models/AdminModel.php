<?php
class AdminModel extends DB
{
    function NumberOrders()
    {
        $sql = "SELECT COUNT(*) AS NumberOrders 
        FROM orders ";
        $query = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $result['NumberOrders'];
    }

    function NumberOrderPendingApproval()
    {
        $sql = "SELECT COUNT(*) AS NumberOrderPendingApproval 
        FROM orders o
        WHERE o.status = 1";
        $query = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $result['NumberOrderPendingApproval'];
    }

    function NumberUsers()
    {
        $sql = "SELECT COUNT(*) AS NumberUsers 
        FROM users ";
        $query = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $result['NumberUsers'];
    }

    function NumberProductsActive()
    {
        $sql = "SELECT COUNT(*) AS NumberProductsActive 
        FROM products p
        WHERE p.status = 1";
        $query = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $result['NumberProductsActive'];
    }

    function NumberProductsNoActive()
    {
        $sql = "SELECT COUNT(*) AS NumberProductsNoActive 
        FROM products p
        WHERE p.status = 0";
        $query = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $result['NumberProductsNoActive'];
    }
}
