<?php
class BrandModel extends DB
{

    public function getAllBrands()
    {
        $query = "SELECT * FROM categorys ";

        $stmt = mysqli_query($this->conn, $query);

        $arr = [];
        while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {
            $arr[] = $row;
        }

        return $arr;
    }

    public function getBrandFilter($BrandsFilter)
    {
        $sql = "SELECT * 
                FROM categorys 
                WHERE Id='$BrandsFilter'
        ";

        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_array($result);
    }

    function getProductsByCategoryId($categoryId, $start = 0, $limit = 8)
    {
        $sql = "SELECT products.*, productimages.path AS imageURL
                FROM products 
                LEFT JOIN productimages ON productimages.productId  = products.Id AND productimages.sortOrder = 1
                WHERE products.categoryID='$categoryId' AND products.status = 1 
                LIMIT $start, $limit";

        $result = mysqli_query($this->conn, $sql);

        // Khởi tạo mảng trống để lưu các sản phẩm
        $products = [];

        // Lặp qua kết quả truy vấn và thêm vào mảng $products
        while ($row = mysqli_fetch_array($result)) {
            $products[] = $row;
        }

        // Trả về mảng sản phẩm
        return $products;
    }
}
