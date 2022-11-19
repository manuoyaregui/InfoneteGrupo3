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
        $idUsuario = $_SESSION["idUsuario"];
        $data["articulo"] = $this->articuloModel->getArticuloYSeccionPorId($idArticulo);

        $usuarioSuscripto = $this->suscripcionYCompraModel->usuarioSuscripto($idUsuario, $idProducto);

        if ($usuarioSuscripto) {
            $data["usuarioSuscripto"] = true;
            echo $this->render->render("view/articuloView.mustache", $data);
        } else {
            // Poner $data["usuarioSuscripto"] = false en el else es opcional, funciona igual
            $data["usuarioSuscripto"] = false;
            echo $this->render->render("view/articuloView.mustache", $data);
        }

    }

}