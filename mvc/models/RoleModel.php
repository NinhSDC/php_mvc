<?php
class RoleModel extends DB
{
    function GetRoleUser($UserId)
    {
        $sql = "SELECT r.Id
                FROM users u 
                LEFT JOIN userrole ur ON ur.userID = u.Id  
                LEFT JOIN roles r ON r.Id = ur.roleID 
                WHERE u.Id = $UserId ";
        $query = mysqli_query($this->conn, $sql);

        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

        return $result['Id'];
    }
}
