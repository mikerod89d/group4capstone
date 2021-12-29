<?php
include_once('user.php');
include_once('model/user_db.php');
include_once('level.php');

class UserController {
    private static function rowToUser($row) {
        $user = new User($row['UserId'],
            $row['Password'], 
            $row['FirstName'],
            $row['LastName'],
            $row['EMail'],
            $row['UserLevelNo']);
            $user->setUserNo($row['UserNo']);
        return $user;
    }

    public static function validUser($email,$password){
        $queryRes = UserDB::getUserByEmail($email);

        if($queryRes){
            $user = self::rowToUser($queryRes);
            if($user->getPassword() === $password) {
                return $user->getUserLevel();
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    public static function getAllUsers(){
        $queryRes = UserDB::getAllUsers();

        if ($queryRes) {
            $users = array();
            foreach ($queryRes as $row) {
                $users[] = self::rowToUser($row);
            }
            return $users;
        }
        else {
            return false;
        }
    }

    public static function getUsersByLevel($userLevel) {
        $queryRes = UserDB::getUsersByLevel($userLevel);

        if ($queryRes) {
            $users = array();
            foreach ($queryRes as $row) {
                $users[] = self::rowToUser($row);
            }
            return $users;
        }
        else {
            return false;
        }
    }

    public static function getUserByNo($userNo) {
        $queryRes = UserDB::getUserByUserNo($userNo);

        if ($queryRes) {
            return self::rowToUser($queryRes);
        }
        else {
            return false;
        }
    }

    public static function deleteUser($userNo) {
        return UserDB::deleteUser($userNo);
    }

    public static function addUser($user) {
        return UserDB::addUser(
            $user->getUserId(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEmail(),
            $user->getUserLevel());
    }

    public static function updateUser($user) {
        return UserDB::updateUser(
            $user->getUserNo(),
            $user->getUserId(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEmail(),
            $user->getUserLevel());
    }

}