<?php

    class ProductoController {

        private $productoModel;
        private $edicionModel;
        private $render;

        public function __construct($render, $productoModel, $edicionModel) {
            $this->render = $render;
            $this->productoModel = $productoModel;
            $this->edicionModel = $edicionModel;
        }

        public function execute() {
            echo $this->render->render("view/crearProductoView.mustache");
        }


        public function vistaPreviaProducto(){
            if( isset($_GET['idProducto'])  && !empty($_GET['idProducto']) ) {
                $idProducto = $_GET['idProducto'];
                $edicionesDelProducto = $this->edicionModel->listaDeEdicionesDeUnProducto($idProducto);
            }
            else {
                $idProducto = 1;
            }

            $consulta = $this->productoModel->getProductoPorId($idProducto);
            if( count($consulta) > 0 ) {
                $productoAMostrar = $consulta[0];
            }
            if( !empty($productoAMostrar) ) {
                //VP = Vista previa
                $data["productoVP"] = $productoAMostrar;
                $data["edicionesDisponibles"] = $edicionesDelProducto;
                echo $this->render->render("view/vistaPreviaProducto.mustache", $data);
            }
            else {
                echo $this->render->render("view/vistaPreviaProducto.mustache");
            }
        }

        public function listarProductos() {
            $data["productos"] = $this->productoModel->listarProductos();
            echo $this->render->render("view/listarProductosView.mustache", $data);
        }

    }