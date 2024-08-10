<?php
class SearchModel extends DB
{

    function Search($KeySearch)
    {
        $sql = "SELECT products.* , 
                    productimages.path AS imageURL
                FROM products
                LEFT JOIN productimages 
                    ON productimages.productId = products.Id 
                    AND productimages.sortOrder = 1
                WHERE products.productName LIKE '%$KeySearch%'
                LIMIT 16
                ";
        return mysqli_query($this->conn, $sql);
    }

    function CountSearch($KeySearch)
    {
        // Xây dựng câu lệnh SQL cho MySQL
        $sql = "SELECT COUNT(*) AS CountSearch
            FROM products
             WHERE products.productName LIKE '%$KeySearch%'";

        // Thực thi câu lệnh SQL với MySQL
        $stmt = mysqli_query($this->conn, $sql);

        // Kiểm tra nếu có lỗi xảy ra trong quá trình truy vấn
        if ($stmt === false) {
            die(mysqli_error($this->conn)); // Hiển thị lỗi MySQL
        }

        // Lấy kết quả từ truy vấn
        $row = mysqli_fetch_assoc($stmt);
        $CountSearch = $row['CountSearch'];

        return $CountSearch;
    }

    function KeySearch($KeySearch, $skip = 0, $take = 8)
    {
        // Xây dựng câu lệnh SQL cho MySQL
        $sql = "SELECT products.* , 
                    productimages.path AS imageURL
                FROM products
                LEFT JOIN productimages 
                    ON productimages.productId = products.Id 
                    AND productimages.sortOrder = 1
                WHERE products.productName LIKE '%$KeySearch%'
                 LIMIT $skip, $take";

        // Thực thi câu lệnh SQL với MySQL
        $stmt = mysqli_query($this->conn, $sql);

        // Kiểm tra nếu có lỗi xảy ra trong quá trình truy vấn
        if ($stmt === false) {
            die(mysqli_error($this->conn)); // Hiển thị lỗi MySQL
        }

        // Khởi tạo mảng để lưu kết quả
        $arr = [];
        while ($row = mysqli_fetch_assoc($stmt)) {
            $arr[] = $row;
        }

        return $arr;
    }
}
