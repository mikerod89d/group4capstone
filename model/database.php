<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'group4capstone';
    private $username = 'helpDesk_user';
    private $password = '8d3eTI9mKEqXKgWC';

    private $conn;
    private $conn_error = '';

    function __construct() {
        mysqli_report(MYSQLI_REPORT_OFF);

        $this->conn = mysqli_connect($this->host,
                $this->username, $this->password,$this->dbname);
        
        if($this->conn === false){
            $this->conn_error = 'Failed to connect to DB: '
             . mysqli_connect_error();
        }
    }

    function __destruct(){
        mysqli_close($this->conn);
    }

    function getDbConn(){
        return $this->conn;
    }
    function getDbError(){
        return $this->conn_error;
    }
    function getDbHost() {
        return $this->host;
    }
    function getDbName(){
        return $this->dbname;
    }
    function getDbUser(){
        return $this->username;
    }
    function getDbUserPw(){
        return $this->password;
    }

}