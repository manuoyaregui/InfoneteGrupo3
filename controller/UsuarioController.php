<?php

    class UsuarioController {

        private $render;
        private $productoModel;
        private $edicionModel;
        private $suscripcionYCompraModel;

        public function __construct($render, $productoModel, $edicionModel, $suscripcionYCompraModel) {
            $this->render = $render;
            $this->productoModel = $productoModel;
            $this->edicionModel = $edicionModel;
            $this->suscripcionYCompraModel = $suscripcionYCompraModel;
        }

        public function execute() {
            $data["producto"] = $this->productoModel->getProductos();
            echo $this->render->render("view/catalogoView.mustache", $data);
        }

        // Hay que corregir a donde se redirecciona al suscribirse y al no poder suscribirse
        public function suscribirseAProducto() {
            $idProducto = $_GET["idProducto"];
            // Se obtiene la fecha actual (en el campo fechaInicio se pone la fecha de hoy al insertar el registro)
            $fechaActual = date("Y-m-d");
            // Se le agrega un mes a la fecha actual
            $fechaVencimientoCalculada = date("Y-m-d", strtotime($fechaActual . "+ 1 month"));
            $precio = $this->productoModel->getProductoPorId($idProducto)[0]["precioSuscripcion"];


            if (isset($_SESSION["idUsuario"]) && isset($_POST["metodoDePago"])) {
                $idUsuario = $_SESSION["idUsuario"];
                $metodoPago = $_POST["metodoDePago"];

                // El usuario esta suscripto si se encuentra en la tabla de suscripciones y ademas su suscripcion sigue vigente
                $usuarioSuscripto = $this->usuarioSuscripto($idUsuario, $idProducto);

                // Si el usuario no esta suscripto entonces se suscribe
                if (!$usuarioSuscripto) {
                    $resultado = $this->suscripcionYCompraModel->suscribirseAProducto($idUsuario, $idProducto, $fechaVencimientoCalculada, $metodoPago, $precio);

                    if ($resultado) {
                        $data["mensajeSuscripto"] = "Suscripto con exito hasta el " . $fechaVencimientoCalculada;
                        echo $this->render->render("view/catalogoView.mustache", $data);
                    }

                } else {
                    $fechaDeVencimiento = $this->obtenerFechaVencimientoDelUsuario($idUsuario, $idProducto);
                    $data["mensajeYaSuscripto"] = "Tu suscripcion sigue vigente hasta el " . $fechaDeVencimiento;
                    echo $this->render->render("view/catalogoView.mustache", $data);
                }

            } else {
                $data["producto"] = $this->productoModel->getProductos();
                $data["mensajeErrorSuscripcion"] = "No se pudo suscribir";
                echo $this->render->render("view/catalogoView.mustache", $data);
            }

        }

        public function comprarEdicion() {
            $idEdicion = $_GET["idEdicion"];
            $precio = $this->edicionModel->getEdicionPorId($idEdicion)[0]["precio"];

            if (isset($_SESSION["idUsuario"]) && isset($_POST["metodoDePago"])) {
                $idUsuario = $_SESSION["idUsuario"];
                $metodoPago = $_POST["metodoDePago"];

                $resultado = $this->suscripcionYCompraModel->comprarEdicion($idUsuario, $idEdicion, $precio, $metodoPago);

                if ($resultado) {
                    $data["mensajeCompra"] = "Se compro la edicion";
                    echo $this->render->render("view/catalogoView.mustache", $data);
                }

            } else {
                $data["producto"] = $this->productoModel->getProductos();
                $data["mensajeErrorCompra"] = "No se pudo comprar la edicion";
                echo $this->render->render("view/catalogoView.mustache", $data);
            }
        }

        public function verArticulosCompletos() {

        }

        private function usuarioSuscripto($idUsuario, $idProducto) {
            $fechaActual = date("Y-m-d");
            $fechaVencimientoDelUsuario = $this->obtenerFechaVencimientoDelUsuario($idUsuario, $idProducto);

            if (!empty($fechaVencimientoDelUsuario)) {
                $suscripcionVencida = $fechaVencimientoDelUsuario < $fechaActual;

                if (!$suscripcionVencida) {
                    return true;
                }

            }


            return false;
        }

        private function obtenerFechaVencimientoDelUsuario($idUsuario, $idProducto) {
            return $this->suscripcionYCompraModel->fechaVencimientoDeSuscripcion($idUsuario, $idProducto)[0]["fechaVencimiento"];
        }


    }
