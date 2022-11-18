<?php

class ArticuloController
{

    private $articuloModel;
    private $render;

    public function __construct($render, $articuloModel) {
        $this->render = $render;
        $this->articuloModel = $articuloModel;
    }

    public function execute() {
        echo $this->render->render("view/articuloView.mustache");
    }

    public function verArticulo(){
        $id = $_GET["articulo"];
        $data["articulo"] = $this->articuloModel->getArticuloYSeccionPorId($id);
        echo $this->render->render("view/articuloView.mustache",$data);
    }
}