<?php

    class ProductoModel {

        private $database;

        public function __construct($database) {
            $this->database = $database;
        }

        public function crearProducto($nombre, $idTipo, $portada, $precioSuscripcion, $idUsuario) {
            $sqlQuery = "INSERT INTO producto (nombre, idTipo, portada, precioSuscripcion, idEscritor, idEstado) 
                         VALUES ('".$nombre."', '".$idTipo."', '".$portada."', '".$precioSuscripcion."', '".$idUsuario."', 1)";

            return $this->database->execute($sqlQuery);
        }

        public function editarProducto($id, $nombre, $idTipo, $portada, $precioSuscripcion) {
            $sqlQuery = "UPDATE producto 
                            SET nombre = '".$nombre."', idTipo = '".$idTipo."', portada = '".$portada."', precioSuscripcion = '".$precioSuscripcion."'
                         WHERE idProducto = '$id'";
            return $this->database->execute($sqlQuery);
        }


        public function listarProductos() {
            $sqlQuery = "SELECT p.*, tp.nombre AS tipoProducto ,e.nombre  AS nombreEstado
                            FROM producto p JOIN tipo_producto tp ON p.idTipo = tp.idTipo
                                            JOIN estado e ON p.idEstado = e.idEstado";
            return $this->database->query($sqlQuery);
        }

        public function getProductos(){
            $sql = "SELECT * FROM producto" ;
            return $this->database->query($sql);
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

        public function getProductosRevista(){
            $sqlQuery = "SELECT * 
                         FROM producto p JOIN tipo_producto tp ON p.idTipo=tp.idTipo 
                         WHERE tp.nombre LIKE 'revista'";
            return $this->database->query($sqlQuery);
        }

        public function getProductosDiario(){
            $sqlQuery = "SELECT * 
                         FROM producto p JOIN tipo_producto tp ON p.idTipo=tp.idTipo 
                         WHERE tp.nombre LIKE 'diario'";
            return $this->database->query($sqlQuery);
        }

        public function listarProductosRevistaDisponibles(){
            $sqlQuery = "SELECT p.* 
                            FROM producto p JOIN tipo_producto tp ON p.idTipo=tp.idTipo
                                            JOIN estado e ON e.idEstado = p.idEstado
                         WHERE tp.nombre LIKE 'revista' AND e.nombre = 'ACTIVO'";
            return $this->database->query($sqlQuery);
        }

        public function listarProductosDiarioDisponibles(){
            $sqlQuery = "SELECT p.* 
                            FROM producto p JOIN tipo_producto tp ON p.idTipo=tp.idTipo
                                            JOIN estado e ON e.idEstado = p.idEstado
                         WHERE tp.nombre LIKE 'diario' AND e.nombre = 'ACTIVO'";
            return $this->database->query($sqlQuery);
        }

        public function habilitarProducto($id) {
            $sqlQuery = "UPDATE producto 
                            SET idEstado = 2 
                         WHERE idProducto = '$id'";
            return $this->database->execute($sqlQuery);
        }


        public function bloquearProducto($id){
            $sqlQuery = "UPDATE producto 
                            SET idEstado = 3 
                         WHERE idProducto = '$id'";
            return $this->database->execute($sqlQuery);
        }

    }