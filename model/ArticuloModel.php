<?php

class ArticuloModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function crearArticulo($titulo, $contenido, $latitud, $longitud) {
        $sql = "INSERT INTO articulo (titulo, descripcion, latitud, longitud)
                    VALUES ('".$titulo."', '".$contenido."', '".$latitud."', '".$longitud."')";
        return $this->database->execute($sql);
    }

}