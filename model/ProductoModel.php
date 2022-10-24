<?php

    class ProductoModel {

        private $database;

        public function __construct($database) {
            $this->database = $database;
        }

        public function crearProducto($nombre, $idTipo) {
            return $this->database->execute("INSERT INTO producto (nombre, idTipo) VALUES ('".$nombre."', '".$idTipo."')");
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

    }