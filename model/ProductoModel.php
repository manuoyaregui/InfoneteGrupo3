<?php

    class ProductoModel {

        private $database;

        public function __construct($database) {
            $this->database = $database;
        }

        public function crearProducto($nombre, $idTipo) {
            return $this->database->execute("INSERT INTO producto (nombre, idTipo) VALUES ('".$nombre."', '".$idTipo."')");
        }

    }