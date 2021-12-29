<?php
class User {

    private $userId;
    private $password;
    private $fName;
    private $lName;
    private $eMail;
    private $userLevel;
    private $userNo;

    public function __construct($userId, $password, $fName,
        $lName, $eMail, $userLevel) {
            $this->userId = $userId;
            $this->password = $password;
            $this->fName = $fName;
            $this->lName = $lName;
            $this->eMail = $eMail;
            $this->userLevel = $userLevel;
        }

        
    public function getUserNo() {
        return $this->userNo;
    }
    public function setUserNo($value) {
        $this->userNo = $value;
    }

    public function getUserId() {
        return $this->userId;
    }
    public function setUserId($value) {
        $this->userId = $value;
    }

    public function getFirstName() {
        return $this->fName;
    }
    public function setFirstName($value) {
        $this->fName = $value;
    }

    public function getLastName() {
        return $this->lName;
    }
    public function setLastName($value) {
        $this->lName = $value;
    }

    public function getEmail() {
        return $this->eMail;
    }
    public function setEmail($value) {
        $this->eMail = $value;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($value) {
        $this->password = $value;
    }
    public function getUserLevel() {
        return $this->userLevel;
    }
    public function setUserLevel($value) {
        $this->userLevel = $value;
    }
}