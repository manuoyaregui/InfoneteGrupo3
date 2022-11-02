<?php

class EdicionModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function crearEdicion($numeroEdicion, $precioEdicion){
        $sqlQuery = "INSERT INTO edicion (numero, precio) VALUES ('".$numeroEdicion."', '".$precioEdicion."')";
        return $this->database->execute($sqlQuery);
    }
}