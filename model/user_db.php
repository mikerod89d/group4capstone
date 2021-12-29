<?php
require_once('database.php');

class UserDB {
    public static function getAllUsers() {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = 'SELECT * FROM users
                INNER JOIN user_levels ON
                    users.UserLevelNo = user_levels.UserLevelNo';
            return $dbConn->query($query);
        }
        else {
            return false;
        }
    }

    public static function getUsersByLevel($userLevel) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = "SELECT * FROM users
                INNER JOIN user_levels ON
                    users.UserLevelNo = user_levels.UserLevelNo
                WHERE users.UserLevelNo = '$userLevel'";
            return $dbConn->query($query);
        }
        else {
            return false;
        }
    }

    public static function getUserByEmail($email){
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn){
            $query = "SELECT * FROM users
                    WHERE users.EMail = '$email'";
        
        $result = $dbConn->query($query);
        return $result->fetch_assoc();
        }
        else{
            return false;
        }
    }

    public static function getUserByUserNo($userNo) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = "SELECT * FROM users
                INNER JOIN user_levels ON
                    users.UserLevelNo = user_levels.UserLevelNo
                WHERE UserNo = '$userNo'";
            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        }
        else {
            return false;
        }

    }

    public static function deleteUser($userNo) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = "DELETE FROM users
                WHERE UserNo = '$userNo'";
            return $dbConn->query($query) === true;
        }
        else {
            return false;
        }
    }
// left off!!!!!!!!
    public static function addUser($userId,$password,
        $fName,$lName, $eMail, $userLevel) {
            $db = new Database();
            $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = 
            "INSERT INTO users (UserId, Password,
                FirstName, LastName, HireDate, EMail, Extension, UserLevelNo)
            VALUES ('$userId','$password','$fName','$lName', 
                '$eMail','$userLevel')";
                
            return $dbConn->query($query) === TRUE;
        }
        else {
            return false;
        }
    }

    public static function updateUser($userNo,$userId,$password,
        $fName,$lName,$eMail,$userLevel) {
            
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            $query = 
            "UPDATE users SET
                UserId = '$userId',
                Password = '$password',
                FirstName = '$fName',
                LastName = '$lName',
                EMail = '$eMail',
                UserLevelNo = '$userLevel'
            WHERE UserNo = '$userNo'";

            return $dbConn->query($query) === TRUE;
        }
        else {
            return false;
        }
    }
}