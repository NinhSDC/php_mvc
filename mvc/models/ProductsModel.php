<?php
class ProductsModel extends DB
{
    function ProductNewHome()
    {
        $sql = "SELECT Products.*,
         categorys.categoryName as categoryName,
          productimgs.path as imageURL
           FROM Products LEFT JOIN productimgs ON productImgs.productId = Products.Id AND productImgs.sortOrder = 1 
           LEFT JOIN categorys ON Products.categoryID = categorys.Id 
           ORDER BY Products.Id DESC 
           LIMIT 16
                ";
        return mysqli_query($this->conn, $sql);
    }
}
