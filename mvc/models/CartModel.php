<?php
class CartModel extends DB
{
    function CheckCartExist($userID)
    {
        $sql = "SELECT Carts.Id as Id
        FROM Carts
        WHERE userID = '$userID' ";
        return mysqli_query($this->conn, $sql);
    }

    function GetQualityInCart($CartId)
    {
        $sql = "SELECT COUNT(*) AS record_count
                FROM cartdetail
                WHERE cartID = '$CartId'";
        return mysqli_query($this->conn, $sql);
    }

    function CreatCart($userID)
    {
        $sql = "INSERT INTO `carts`( `userID`)
                  VALUES ('$userID')";
                  echo $sql;
        return mysqli_query($this->conn, $sql);
    }

    function GetCart($CartId)
    {
        $sql = "SELECT CartDetail.quantity as Quantity,
                CartDetail.Id as CartDetailId,
                products.*,
                products.Id as ProductId
                FROM cartDetail 
                LEFT JOIN products ON products.Id = cartDetail.productID
                LEFT JOIN productImages ON productImages.productId = products.Id
                WHERE cartDetail.cartId = '$CartId' ";

        return mysqli_query($this->conn, $sql);
    }

    function GetProductInCart($CartId, $ProductId)
    {
        $sql = "SELECT *
        FROM CartDetail
        WHERE cartID= '$CartId' AND productID = '$ProductId'";
        return mysqli_query($this->conn, $sql);
    }

    function creatCartDetail($CartId, $ProductId, $Quantity)
    {
        $sql = "INSERT INTO CartDetail (cartId,productId,quantity)
                VALUES ('$CartId','$ProductId','$Quantity'";
        return mysqli_query($this->conn, $sql);
    }

    function UpdateCartDetail($CartId, $ProductId, $Quantity,)
    {
        $sql = "UPDATE CartDetails
        SET Quantity = $Quantity
        WHERE CartId = '$CartId' AND ProductId = '$ProductId'";
        return mysqli_query($this->conn, $sql);
    }
}
