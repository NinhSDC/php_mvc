<?php
class CategoriesModel extends DB
{
    function categorys()
    {
        $sql = "SELECT * FROM categorys";
        return mysqli_query($this->conn, $sql);
    }
    function categorys_id($Id)
    {
        $sql = "SELECT name FROM categorys WHERE Id = $Id";
        return mysqli_query($this->conn, $sql);
    }
}
