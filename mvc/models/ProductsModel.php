<?php
class ProductsModel extends DB
{
    function ProductNewHome()
    {
        $sql = "SELECT Products.*,
                categorys.categoryName as categoryName
                FROM Products
                LEFT JOIN categorys ON Products.categoryID = categorys.Id
                ORDER BY Products.Id DESC
                LIMIT 16;
                ";
        return mysqli_query($this->conn, $sql);
    }
}
