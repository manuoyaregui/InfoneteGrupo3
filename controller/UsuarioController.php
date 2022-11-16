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
            $fechaVencimiento = date("Y-m-d", strtotime($fechaActual . "+ 1 month"));
            $precio = $this->productoModel->getProductoPorId($idProducto)[0]["precioSuscripcion"];

            if (isset($_SESSION["idUsuario"]) && isset($_POST["metodoDePago"])) {
                $idUsuario = $_SESSION["idUsuario"];
                $metodoPago = $_POST["metodoDePago"];

                $resultado = $this->suscripcionYCompraModel->suscribirseAProducto($idUsuario, $idProducto, $fechaVencimiento, $metodoPago, $precio);

                if ($resultado) {
                    $data["mensajeSuscripto"] = "Suscripto con exito";
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


    }
