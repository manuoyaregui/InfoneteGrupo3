<?php


class ArticuloController
{

    private $articuloModel;
    private $suscripcionYCompraModel;
    private $render;
    private $dompdf;

    public function __construct($render, $articuloModel, $suscripcionYCompraModel,$dompdf) {
        $this->render = $render;
        $this->articuloModel = $articuloModel;
        $this->suscripcionYCompraModel = $suscripcionYCompraModel;
        $this->dompdf = $dompdf;
    }

    public function execute() {
        echo $this->render->render("view/articuloView.mustache");
    }

    public function verArticulo(){
        $idArticulo = $_GET["articulo"];
        $idProducto = $_GET["idProducto"];
        $idEdicion = $_GET["idEdicion"];

        if (isset( $_SESSION["idUsuario"])) {
            $idUsuario = $_SESSION["idUsuario"];
            $data["articulo"] = $this->articuloModel->getArticuloYSeccionPorId($idArticulo);

            $usuarioSuscripto = $this->suscripcionYCompraModel->usuarioSuscripto($idUsuario, $idProducto);
            $usuarioPoseeLaEdicion = $this->suscripcionYCompraModel->usuarioPoseeEdicion($idUsuario, $idEdicion);

            if ($usuarioSuscripto || $usuarioPoseeLaEdicion || $this->tienePermisos()) {
                $data["usuarioPuedeVerArticulo"] = true;
                $data["idProducto"]= $idProducto;
                $data["idEdicion"]= $idEdicion;
                echo $this->render->render("view/articuloView.mustache", $data);
            }
            else {
                // Poner $data["usuarioPuedeVerArticulo"] = false en el else es opcional, funciona igual
                $data["usuarioPuedeVerArticulo"] = false;
                echo $this->render->render("view/articuloView.mustache", $data);
            }
        }else {
            // Poner $data["usuarioPuedeVerArticulo"] = false en el else es opcional, funciona igual
            $data["usuarioPuedeVerArticulo"] = false;
            echo $this->render->render("view/articuloView.mustache", $data);
        }

    }

    public function descarga(){
        $idAr=$_GET["idAr"];
        $idEd=$_GET["idEd"];
        $idPr=$_GET["idPr"];

        $html =  $this->precargarHtml($idAr,$idPr,$idEd);

        $this->dompdf->imp($html);
    }

    public function precargarHtml($idAr,$idPr,$idEd){
        $idArticulo = $idAr;
        $idProducto = $idPr;
        $idEdicion = $idEd;

        if (isset( $_SESSION["idUsuario"])) {
            $idUsuario = $_SESSION["idUsuario"];
            $data["articulo"] = $this->articuloModel->getArticuloYSeccionPorId($idArticulo);

            $usuarioSuscripto = $this->suscripcionYCompraModel->usuarioSuscripto($idUsuario, $idProducto);
            $usuarioPoseeLaEdicion = $this->suscripcionYCompraModel->usuarioPoseeEdicion($idUsuario, $idEdicion);

            if ($usuarioSuscripto || $usuarioPoseeLaEdicion || $this->tienePermisos()) {
                $data["usuarioPuedeVerArticulo"] = true;
                $data["idProducto"]= $idProducto;
                $data["idEdicion"]= $idEdicion;
//                return $this->render->render("view/articuloView.mustache", $data);
                return $this->render->render("view/articuloPDF.mustache", $data);
            }
        }
    }


    private function tienePermisos(){

        return isset($_SESSION['rol']) && 
                    ($_SESSION['rol'] != 'ADMINISTRADOR' ||
                     $_SESSION['rol'] != 'ESCRITOR' ||
                     $_SESSION['rol'] != 'EDITOR');
    }
}