<?php

class InicioModel
{


    public function __construct($database){
        $this->database=$database;
    }

    public function getProductos(){
        $sql = "SELECT * FROM producto" ;
        return $this->database->query($sql);
    }

}