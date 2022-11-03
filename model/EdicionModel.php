<?php

class EdicionModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function crearEdicion($numeroEdicion, $precioEdicion, $idProducto){
        if($this->buscarEdicionPorNroDeProductoYNroDeEdicion($idProducto, $numeroEdicion) == null){
            $sqlQuery = "INSERT INTO edicion (numero, precio, idProducto) VALUES ('".$numeroEdicion."', '".$precioEdicion."', '".$idProducto."')";
            return $this->database->execute($sqlQuery);
        }
    }

    public function buscarEdicionPorNroDeProductoYNroDeEdicion($idProducto, $numeroEdicion){
        $consulta = "select * from edicion where idProducto = ".$idProducto." and numero = ".$numeroEdicion;

        return $this->database->query($consulta);
    }

    public function listaDeEdicionesDeUnProducto($idProducto){
        $consulta = "select * from edicion where idProducto = ".$idProducto;
        return $this->database->query($consulta);
    }
}