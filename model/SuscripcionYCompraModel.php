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

        public function getIdCompraDeEdicion($idUsuario, $idEdicion) {
            $sql = "SELECT idCompra
                        FROM compra
                    WHERE idUsuario = '$idUsuario' AND idEdicion = '$idEdicion'";
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

        public function usuarioPoseeEdicion($idUsuario, $idEdicion) {
            if (!empty($this->getIdCompraDeEdicion($idUsuario, $idEdicion))) {
                return true;
            }
            return false;
        }

        public function getSuscripcionesDeUsuarioPorIdUsuario($idUsuario){
            $sql = "SELECT sus.*, pr.nombre AS prNombre
                FROM suscripcion sus 
                    JOIN producto pr ON pr.idProducto = sus.idProducto
                WHERE sus.idUsuario = '$idUsuario'";
            return $this->database->query($sql);
        }
        public function getEdicionesDeUsuarioPorIdUsuario($idUsuario){
            //compra --> ternaria -->edicion,producto

            $sql = "
                select  compra.*, ed.numero as edNumero, pr.nombre as prodNombre, pr.idProducto as prodId
                from  compra
                    join edicion_seccion_articulos ter on ter.idEdicion = compra.idEdicion
                    join edicion ed on ed.idEdicion = ter.idEdicion
                    join producto pr on pr.idProducto = ed.idProducto
                where compra.idUsuario = ".$idUsuario;
            return $this->database->query($sql);
        }

        public function cantidadSuscripcionesPorDia() {
            $sql = "SELECT COUNT(sus.idSuscripcion) AS cantSuscripcionesTotales, sus.fechaInicio
                        FROM suscripcion sus
                            JOIN producto pr ON pr.idProducto = sus.idProducto
                    GROUP BY sus.fechaInicio";
            return $this->database->query($sql);
        }

        public function cantidadSuscripcionesPorProducto() {
            $sql = "SELECT pr.nombre AS producto, COUNT(sus.idSuscripcion) AS cantSuscripciones
                        FROM suscripcion sus
                            JOIN producto pr ON pr.idProducto = sus.idProducto
                    GROUP BY pr.nombre";
            return $this->database->query($sql);
        }

        public function cantidadComprasPorEdicion() {
            $sql = "SELECT ed.numero AS edicion, pr.nombre AS producto, COUNT(c.idCompra) AS cantCompras
                        FROM compra c
                            JOIN edicion ed ON ed.idEdicion = c.idEdicion
                            JOIN producto pr ON pr.idProducto = ed.idProducto
                    GROUP BY pr.idProducto";
            return $this->database->query($sql);
        }

        public function isSuscribedTo($idUsuario,$idProducto){
            $sql = "
                select *
                from suscripcion
                where idProducto = {$idProducto} and idUsuario = {$idUsuario}
            ";

            return $this->database->query($sql) != false;
        }

    }