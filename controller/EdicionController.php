<?php

class EdicionController
{

    private $articuloModel;
    private $render;

    public function __construct($render, $articuloModel) {
        $this->render = $render;

        $this->articuloModel = $articuloModel;
    }

    public function execute() {
        echo $this->render->render("view/edicionView.mustache");
    }

    public function listarArticulos()
    {
        if (isset($_GET['idProducto']) && !empty($_GET['idProducto'])) {
            if (isset($_GET['idEdicion']) && !empty($_GET['idEdicion'])) {
                $idProducto = $_GET['idProducto'];
                $idEdicion = $_GET['idEdicion'];
                $articulosDeLaEdicion = $this->articuloModel->listarArticulosPorEdicion($idProducto, $idEdicion);
                $data["articulosDeLaEdicion"] = $articulosDeLaEdicion;
                echo $this->render->render("view/edicionView.mustache", $data);
            }
        }
    }


}