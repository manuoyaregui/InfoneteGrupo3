<?php

class MysqlDatabase{
    private $connection;

    public function __construct($servername, $username, $password, $dbname){
        $conn = mysqli_connect(
            $servername,
            $username,
            $password,
            $dbname
        );

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $this->connection = $conn;
    }

    public function query($sql){
        $result = mysqli_query($this->connection, $sql);
        if(gettype($result) != "boolean")
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $result;
    }

    public function execute($sql){
        mysqli_query($this->connection, $sql);
    }
}