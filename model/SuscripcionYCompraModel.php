<?php

    class SuscripcionYCompraModel {

        private $database;

        public function __construct($database) {
            $this->database = $database;
        }

        public function listarMetodosDePago() {
            $sql = "SELECT idMedioDePago, nombre AS metodoDePago
                        FROM medio_de_pago";
            return $this->database->query($sql);
        }

        public function suscribirseAProducto($idUsuario, $idProducto, $fechaVencimiento, $metodoPago, $precio) {
            $sql = "INSERT INTO suscripcion(idUsuario, idProducto, fechaVencimiento, idMedioDePago, precio)
                        VALUES ('".$idUsuario."', '".$idProducto."', '".$fechaVencimiento."', '".$metodoPago."', '".$precio."')";
            return $this->database->execute($sql);
        }

        public function comprarEdicion($idUsuario, $idEdicion, $precio, $metodoPago) {
            $sql = "INSERT INTO compra(idUsuario, idEdicion, precio, idMedioDePago)
                        VALUES ('".$idUsuario."', '".$idEdicion."', '".$precio."', '".$metodoPago."')";
            return $this->database->execute($sql);
        }

    }