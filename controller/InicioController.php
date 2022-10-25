<?php

class InicioController
{
    private $render;

    public function __construct($inicioModel,$render){
        $this->render = $render;
        $this->inicioModel = $inicioModel;
    }

    public function execute(){
        $data["producto"] = $this->inicioModel->getProductos();
        echo $this->render->render("view/catalogoView.mustache",$data);
    }


}