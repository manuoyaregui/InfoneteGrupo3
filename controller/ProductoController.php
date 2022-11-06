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


        public function vistaPreviaProducto(){
            if( isset($_GET['idProducto'])  && !empty($_GET['idProducto']) )
                $idProducto = $_GET['idProducto'];
            else
                $idProducto = 1;

            $consulta = $this->productoModel->getProductoPorId($idProducto);
            if( count($consulta) > 0 )
                $productoAMostrar = $consulta[0];
            if( !empty($productoAMostrar) ) {

                //VP = Vista previa
                $data["productoVP"] = $productoAMostrar;
                echo $this->render->render("view/vistaPreviaProducto.mustache", $data);
            }
            else
                echo $this->render->render("view/vistaPreviaProducto.mustache");
        }

        public function listarProductos() {
            $data["productos"] = $this->productoModel->listarProductos();
            echo $this->render->render("view/listarProductosView.mustache", $data);
        }

    }