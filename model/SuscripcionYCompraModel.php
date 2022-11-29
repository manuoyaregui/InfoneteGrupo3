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
            $sql = "SELECT sus.*, pr.nombre AS prNombre, pr.portada AS prPortada
                FROM suscripcion sus 
                    JOIN producto pr ON pr.idProducto = sus.idProducto
                WHERE sus.idUsuario = '$idUsuario'";
            return $this->database->query($sql);
        }
        public function getEdicionesDeUsuarioPorIdUsuario($idUsuario){
            $sql = "SELECT ed.idEdicion, ed.numero AS edNumero, pr.nombre AS prodNombre, pr.idProducto AS prodId, ed.portadaEdicion AS edPortada, c.precio AS precio, c.fecha AS fecha
                        FROM compra c
                            JOIN edicion ed ON ed.idEdicion = c.idEdicion
                            JOIN producto pr ON pr.idProducto = ed.idProducto
                        WHERE c.idUsuario = '$idUsuario'";
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

        public function listarClientesSuscriptos() {
            $sql = "SELECT u.*, pr.nombre AS producto
      	                FROM suscripcion sus
                            JOIN compra c ON c.idUsuario = sus.idUsuario
                            JOIN usuario u ON u.idUsuario = sus.idUsuario
                            JOIN producto pr ON pr.idProducto = sus.idProducto";
            return $this->database->query($sql);
        }

        public function listarSuscripciones() {
            $sql = "SELECT pr.*, u.nombre AS escritor, COUNT(sus.idSuscripcion) AS cantSuscripciones
                        FROM suscripcion sus
                            JOIN producto pr ON pr.idProducto = sus.idProducto
                            JOIN usuario u on pr.idEscritor = u.idUsuario
                    GROUP BY sus.idProducto";
            return $this->database->query($sql);
        }

        public function listarEdicionesVendidas() {
            $sql = "SELECT ed.*, p.nombre AS producto, COUNT(c.idCompra) AS vecesComprada
                        FROM compra c
                            JOIN edicion ed ON ed.idEdicion = c.idEdicion
                            JOIN producto p on ed.idProducto = p.idProducto
                    GROUP BY c.idEdicion";
            return $this->database->query($sql);
        }

    }