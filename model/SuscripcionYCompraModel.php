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
            $sql = "INSERT INTO compra(idUsuario, idEdicion, precio, medioDePago)
                        VALUES ('".$idUsuario."', '".$idEdicion."', '".$precio."', '".$metodoPago."')";
            return $this->database->execute($sql);
        }

        public function fechaVencimientoDeSuscripcion($idUsuario, $idProducto) {
            // Trae la ultima fecha de vencimiento (ultima suscripcion realizada)
            $sql = "SELECT fechaVencimiento 
                        FROM `suscripcion` 
                    WHERE idUsuario = '$idUsuario' AND idProducto = '$idProducto'
                        ORDER BY idSuscripcion DESC LIMIT 1";
            return $this->database->query($sql);
        }

        public function usuarioSuscripto($idUsuario, $idProducto) {
            $fechaActual = date("Y-m-d");
            $fechaVencimientoDelUsuario = $this->fechaVencimientoDeSuscripcion($idUsuario, $idProducto);

            if (!empty($fechaVencimientoDelUsuario)) {
                // [0]["fechaVencimiento] se usa aca porque sino estaria comparando la fechaActual con un array
                $suscripcionVencida = $fechaVencimientoDelUsuario[0]["fechaVencimiento"] < $fechaActual;

                if (!$suscripcionVencida) {
                    return true;
                }

            }

            return false;
        }

    }