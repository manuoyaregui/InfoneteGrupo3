<?php

    // TODO: Puede que se tenga que cambiar ProductoController por ContenidistaController y AdminController porque ambos pueden crear revistas/diarios
    class ProductoController {

        private $productoModel;
        private $render;

        public function __construct($render, $productoModel) {
            $this->render = $render;
            $this->productoModel = $productoModel;
        }

        public function execute() {
            echo $this->render->render("view/crearProductoView.mustache");
        }

        public function crearProducto() {
            $nombre = $_POST["nombre"];
            $idTipo = $_POST["tipoProducto"];

            if (!empty($nombre) && !empty($idTipo)) {

                $nombreEnMayuscula = strtoupper($nombre);

                $resultado = $this->productoModel->crearProducto($nombreEnMayuscula, $idTipo);
            }

            if ($resultado) {
                echo $this->render->render("view/inicio.mustache");
            }

        }

    }