<?php

class InicioController
{
    private $render;
    private $productoModel;

    public function __construct($productoModel,$render){
        $this->render = $render;
        $this->productoModel = $productoModel;
    }

    public function execute(){
        $data["producto"] = $this->productoModel->getProductos();
        echo $this->render->render("view/catalogoView.mustache",$data);
    }

    public function listarDiarios(){
        $data["producto"] = $this->productoModel->listarProductosDiarioDisponibles();
        echo $this->render->render("view/catalogoView.mustache",$data);
    }

    public function listarRevistas(){
        $data["producto"] = $this->productoModel->listarProductosRevistaDisponibles();
        echo $this->render->render("view/catalogoView.mustache",$data);
    }

}