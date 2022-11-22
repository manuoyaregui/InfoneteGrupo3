<?php

    class ProductoController {

        private $productoModel;
        private $edicionModel;
        private $suscripcionYCompraModel;
        private $render;

        public function __construct($render, $productoModel, $edicionModel, $suscripcionYCompraModel) {
            $this->render = $render;
            $this->productoModel = $productoModel;
            $this->edicionModel = $edicionModel;
            $this->suscripcionYCompraModel = $suscripcionYCompraModel;
        }

        public function execute() {
            echo $this->render->render("view/crearProductoView.mustache");
        }


        public function vistaPreviaProducto(){
            if( isset($_GET['idProducto']) && !empty($_GET['idProducto']) ) {
                $idProducto = $_GET['idProducto'];
                $edicionesDelProducto = $this->edicionModel->listarEdicionesDisponibles($idProducto);
                $metodosDePago = $this->suscripcionYCompraModel->listarMetodosDePago();
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
                if(isset($_SESSION['idUsuario']) &&
                    $this->suscripcionYCompraModel->isSuscribedTo($_SESSION['idUsuario'] , $idProducto)){

                    $data['isSuscribed'] = true;
                }
                $data["productoVP"] = $productoAMostrar;
                $data["edicionesDisponibles"] = $edicionesDelProducto;
                $data["metodosDePago"] = $metodosDePago;
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