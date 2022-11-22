<?php

class EdicionModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function crearEdicion($numeroEdicion,$portadaEdicion, $precioEdicion, $idProducto, $fechaEdicion){
        if($this->buscarEdicionPorNroDeProductoYNroDeEdicion($idProducto, $numeroEdicion) == null){
            $sqlQuery = "
                INSERT INTO edicion (idEdicion,numero,portadaEdicion, precio, idProducto, fechaEdicion, idEstado) 
                VALUES (null,'".$numeroEdicion."','".$portadaEdicion."', '".$precioEdicion."', '".$idProducto."', '".$fechaEdicion."', 1)";
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
        $consulta = "select * from edicion where idProducto =".$idProducto;
        return $this->database->query($consulta);
    }

    public function listarEdicionesDisponibles($idProducto) {
        $sql = "SELECT ed.*
                    FROM edicion ed
                        JOIN estado es ON es.idEstado = ed.idEstado
                    WHERE ed.idProducto = '$idProducto' AND es.nombre = 'ACTIVO'";
        return $this->database->query($sql);
    }

    public function listarEdiciones(){
        $consulta = "SELECT ed.*, p.portada AS portadaProducto, es.nombre AS estado
                       FROM edicion ed 
                           JOIN producto p ON ed.idProducto = p.idProducto
                           JOIN estado es ON es.idEstado = ed.idEstado";
        return $this->database->query($consulta);
    }

    public function aprobarEdicion($idEdicion) {
        $sql = "UPDATE edicion
                    SET idEstado = 2
                WHERE idEdicion = '$idEdicion'";
        return $this->database->execute($sql);
    }

    public function desaprobarEdicion($idEdicion) {
        $sql = "UPDATE edicion
                    SET idEstado = 1
                WHERE idEdicion = '$idEdicion'";
        return $this->database->execute($sql);
    }

}