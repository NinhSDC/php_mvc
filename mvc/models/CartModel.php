<?php
class CartModel extends DB
{
    function CheckCartExist($userID)
    {
        $sql = "SELECT *
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
        $sql = "INSERT INTO Carts (userID)
                         VALUES ('$userID')";
        return mysqli_query($this->conn, $sql); 
    }

    function GetCart($CartId)
    {
        $sql = "SELECT *,
                FROM CartDetail
                WHERE CartDetails.CartId = '$CartId' " ;

        return mysqli_query($this->conn, $sql); 
    }

    function GetProductInCart($CartId,$ProductId)
    {
        $sql = "SELECT *
        FROM CartDetail
        WHERE cartID= '$CartId' AND productID = '$ProductId'";
        return mysqli_query($this->conn, $sql); 
    }

    function creatCartDetail($CartId, $ProductId, $Quantity ){
        $sql ="INSERT INTO CartDetails (cartId,productId,quantity)
                VALUES ('$CartId','$ProductId','$Quantity'";
        return mysqli_query($this->conn, $sql); 
    }

    function UpdateCartDetail($CartId,$ProductId,$Quantity, ) {
        $sql ="UPDATE CartDetails
        SET Quantity = $Quantity
        WHERE CartId = '$CartId' AND ProductId = '$ProductId'";
        return mysqli_query($this->conn, $sql); 
    }
}
