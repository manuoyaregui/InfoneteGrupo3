<?php

    class UsuarioController {

        private $render;
        private $productoModel;
        private $articuloModel;
        private $suscripcionYCompraModel;

        public function __construct($render, $productoModel, $articuloModel, $suscripcionYCompraModel) {
            $this->render = $render;
            $this->productoModel = $productoModel;
            $this->articuloModel = $articuloModel;
            $this->suscripcionYCompraModel = $suscripcionYCompraModel;
        }

        public function execute() {
            $data["producto"] = $this->productoModel->getProductos();
            echo $this->render->render("view/catalogoView.mustache", $data);
        }

        // Hay que corregir a donde se redirecciona al suscribirse y al no poder suscribirse
        public function suscribirseAProducto() {
            $idProducto = $_GET["idProducto"];
            $fechaVencimiento = "202212116";
            $precio = $this->productoModel->getProductoPorId($idProducto)[0]["precioSuscripcion"];

            if (isset($_SESSION["idUsuario"]) && isset($metodoPago)) {
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


    }
