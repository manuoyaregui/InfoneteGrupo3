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

        return mysqli_fetch_all($result,MYSQLI_ASSOC); //SIEMPRE DEVUELVE UN ARRAY
    }

    public function execute($sql){
        return mysqli_query($this->connection, $sql);
    }

    public function lastID(){
        return mysqli_insert_id($this->connection);
    }
}