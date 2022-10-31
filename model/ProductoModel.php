<?php

    class ProductoModel {

        private $database;

        public function __construct($database) {
            $this->database = $database;
        }

        public function crearProducto($nombre, $idTipo, $portada) {
            $sqlQuery = "INSERT INTO producto (nombre, idTipo, portada) VALUES ('".$nombre."', '".$idTipo."', '".$portada."')";
            return $this->database->execute($sqlQuery);
        }

        public function getProductoPorId($idRecibido){
            $consulta = "
                select p.*,
                       tp.nombre as tipoProducto 
                from producto p 
                    join tipo_producto tp on p.idTipo=tp.idTipo
                where idProducto = " . $idRecibido;

            return $this->database->query($consulta);
        }

        public function listarProductos() {
            $sqlQuery = "SELECT p.*, tp.nombre AS tipoProducto
                            FROM producto p JOIN tipo_producto tp ON p.idTipo = tp.idTipo";

            return $this->database->query($sqlQuery);
        }

        public function editarProducto($id, $nombre, $idTipo, $portada) {
            $sqlQuery = "UPDATE producto 
                            SET nombre = '".$nombre."', idTipo = '".$idTipo."', portada = '".$portada."' 
                         WHERE idProducto = '$id'";
            return $this->database->execute($sqlQuery);
        }

        public function eliminarProducto($id) {
            $sqlQuery = "DELETE FROM producto WHERE idProducto = " . $id;
            return $this->database->execute($sqlQuery);
        }

    }