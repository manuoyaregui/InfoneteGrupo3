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

        public function crearProducto()
        {

            if (isset($_POST["nombre"]) && isset($_POST["tipoProducto"]) && isset($_FILES["portada"]["name"])) {

                $nombre = $_POST["nombre"];
                $idTipo = $_POST["tipoProducto"];
                $portada = str_replace(" ", "-", $_FILES["portada"]["name"]);

                if (!empty($nombre) && !empty($idTipo)) {

                    $nombreEnMayuscula = mb_strtoupper($nombre, 'utf-8');

                    $resultado = $this->productoModel->crearProducto($nombreEnMayuscula, $idTipo, $portada);

                    if (!empty($portada)) {

                        move_uploaded_file($_FILES["portada"]["tmp_name"], "public/img/portadasDeProducto/" . $portada);

                    }

                }

                if ($resultado) {
                    header('Location: /escritor/listarProductos');
                    //exit();
                }

            }
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

    }