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
        $sql = "SELECT cartDetail.quantity as Quantity,
                cartDetail.Id as CartDetailId,
                cartDetail.cartId as CartId,
                products.*,
                products.Id as ProductId,
                productImages.path as pathImg
                FROM cartDetail 
                LEFT JOIN products ON products.Id = cartDetail.productID
                LEFT JOIN productImages ON productImages.productId = products.Id
                WHERE cartDetail.cartId = '$CartId' AND productImages.sortOrder = 1 ";

        return mysqli_query($this->conn, $sql);
    }

    function DelProductToCart($IdCart, $productId)
    {
        $sql = "DELETE FROM `cartdetail` WHERE cartdetail.cartID = '$IdCart' AND cartdetail.productID = '$productId' ";
        return mysqli_query($this->conn, $sql);
    }

    function UpdatesToCart($CartDetailId, $CartId, $ProductId, $Quantity)
    {
        $sql = "UPDATE cartdetail
            SET quantity = $Quantity
            WHERE Id = '$CartDetailId' AND cartID = '$CartId' AND productID = '$ProductId';
";
        return mysqli_query($this->conn, $sql);
    }

    function GetProductInCart($CartId, $ProductId)
    {
        $sql = "SELECT *
        FROM cartdetail
        WHERE cartID= '$CartId' AND productID = '$ProductId'";
        return mysqli_query($this->conn, $sql);
    }

    function creatCartDetail($CartId, $ProductId, $Quantity)
    {
        $sql = "INSERT INTO cartdetail (`cartID`, `productID`, `quantity`)
                VALUES ('$CartId','$ProductId','$Quantity')";
        return mysqli_query($this->conn, $sql);
    }

    function UpdateCartDetail($CartId, $ProductId, $Quantity,)
    {
        $sql = "UPDATE cartDetail
                SET quantity = $Quantity
                WHERE cartID = '$CartId' AND productID = '$ProductId'";
        return mysqli_query($this->conn, $sql);
    }

    function CreateOrder($UserId, $Email, $PhoneNumber, $Address, $PaymentMethod, $Total)
    {
        if ($UserId == 'null') {
            $handleUserId = 'NULL';
        } else {
            $handleUserId = "'$UserId'";
        }

        $sql = "INSERT INTO `orders` (`userID`, `orderDate`, `PhoneNumber`, `totalAmount`, `status`, `email`, `address`, `paymentMethod`) 
                           VALUES ($handleUserId, CURDATE(), '$PhoneNumber', '$Total', 1, '$Email', '$Address', '$PaymentMethod')";
        echo $sql;
        if (mysqli_query($this->conn, $sql)) {
            // Lấy ID của đơn hàng vừa được chèn
            $orderId = mysqli_insert_id($this->conn);
            return $orderId;
        } else {
            return false;
        }
    }

    function CreateOrderDetails($OrderId, $ProductId, $Quantity, $ProducPrice)
    {
        $sql = "INSERT INTO `orderdetail`(`orderID`, `productID`, `quantity`, `price`)
                               VALUES ('$OrderId','$ProductId','$Quantity','$ProducPrice')";
        return mysqli_query($this->conn, $sql);
    }

    function DeleteCartDetail($CartId)
    {
        $sql = "DELETE 
                FROM cartDetail
                WHERE cartID = '$CartId'";
        return mysqli_query($this->conn, $sql);
    }

    function getCountOrders($IdUser)
    {
        $sql = "SELECT COUNT(orders.[Id])
                  FROM orders 
                  WHERE `userID` = '$IdUser' ";

        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_array($result)[0];
    }
}
