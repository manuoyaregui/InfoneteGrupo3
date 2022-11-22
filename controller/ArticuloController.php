<?php

class ArticuloController
{

    private $articuloModel;
    private $suscripcionYCompraModel;
    private $render;

    public function __construct($render, $articuloModel, $suscripcionYCompraModel) {
        $this->render = $render;
        $this->articuloModel = $articuloModel;
        $this->suscripcionYCompraModel = $suscripcionYCompraModel;
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

            if ($usuarioSuscripto || $usuarioPoseeLaEdicion) {
                $data["usuarioPuedeVerArticulo"] = true;
                echo $this->render->render("view/articuloView.mustache", $data);
            }
        }else {
            // Poner $data["usuarioPuedeVerArticulo"] = false en el else es opcional, funciona igual
            $data["usuarioPuedeVerArticulo"] = false;
            echo $this->render->render("view/articuloView.mustache", $data);
        }
    }

}