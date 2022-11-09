<?php

class EdicionModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function crearEdicion($numeroEdicion, $precioEdicion, $idProducto, $fechaEdicion){
        if($this->buscarEdicionPorNroDeProductoYNroDeEdicion($idProducto, $numeroEdicion) == null){
            $sqlQuery = "
                INSERT INTO edicion (numero, precio, idProducto, fechaEdicion) 
                VALUES ('".$numeroEdicion."', '".$precioEdicion."', '".$idProducto."', '".$fechaEdicion."')";
            return $this->database->execute($sqlQuery);
        }
    }

    public function editarEdicion($id, $numeroEdicion, $precioEdicion, $idProducto){
        $consulta = "UPDATE edicion 
                        SET numero = '".$numeroEdicion."', precio = '".$precioEdicion."', idProducto = '".$idProducto."'
                            WHERE idEdicion = '$id'";
        return $this->database->execute($consulta);
    }

    public function buscarEdicionPorNroDeProductoYNroDeEdicion($idProducto, $numeroEdicion){
        $consulta = "select * from edicion where idProducto = ".$idProducto." and numero = ".$numeroEdicion;

        return $this->database->query($consulta);
    }

    public function getEdicionPorId($idRecibido){
        $consulta = "SELECT e.*, p.nombre AS nombreProducto
                       FROM edicion e JOIN producto p ON e.idProducto = p.idProducto
                        WHERE idEdicion = ". $idRecibido;
        return $this->database->query($consulta);
    }

    public function listaDeEdicionesDeUnProducto($idProducto){
        $consulta = "select * from edicion where idProducto = ".$idProducto;
        return $this->database->query($consulta);
    }

    public function listarEdiciones(){
        $consulta = "select e.*, p.portada AS portadaProducto 
                       FROM edicion e JOIN producto p ON e.idProducto = p.idProducto";
        return $this->database->query($consulta);
    }
}