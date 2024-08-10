<?php
class ProductsModel extends DB
{
    function ProductNewHome()
    {
        $sql = "SELECT Products.*,
         categorys.categoryName as categoryName,
          ProductImages.path as imageURL
           FROM Products
           LEFT JOIN ProductImages ON ProductImages.productId = Products.Id AND ProductImages.sortOrder = 1 
           LEFT JOIN categorys ON Products.categoryID = categorys.Id 
           ORDER BY Products.Id DESC 
           LIMIT 16
                ";
        return mysqli_query($this->conn, $sql);
    }

    function Detailproduct($IdProduct)
    {
        $sql = "SELECT Products.*,
                productdetail.*
                FROM products
                LEFT JOIN productdetail ON productdetail.productID = products.Id
                WHERE Products.Id = '$IdProduct'";
        return mysqli_query($this->conn, $sql);
    }

    function getImgDetailproduct($IdProduct)
    {
        $sql = "SELECT *
                FROM ProductImages
                WHERE ProductId = '$IdProduct' 
                AND sortOrder IN (1, 2, 3, 4)
                ORDER BY sortOrder ASC";
        return mysqli_query($this->conn, $sql);
    }

    function getProductDetailedConfigs($IdProduct)
    {
        $sql = "SELECT *
                FROM productdetail
                WHERE productdetail.productID = '$IdProduct' ";
        return mysqli_query($this->conn, $sql);
    }

    function GetInfProduct($ProductId)
    {
        $sql = "SELECT Products.*,
                      ProductImages.path
               FROM Products 
               LEFT JOIN ProductImages ON Products.Id = ProductImages.ProductId
               WHERE Products.Id = '$ProductId' AND ProductImages.sortOrder = 1 ";

        return mysqli_query($this->conn, $sql);
    }

    function getCountProductsByCategoryId($ProductId)
    {
        $sql = "SELECT COUNT(*) FROM Products WHERE CategoryID='$ProductId'";

        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_array($result)[0];
    }
}
