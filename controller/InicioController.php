<?php

class InicioController
{
    private $render;

    public function __construct($render){
        $this->render = $render;
    }

    public function execute(){
        echo $this->render->render("view/catalogoView.mustache");
    }

    public function verProducto(){
        echo $this->render->render("view/verProducto.mustache");
    }
}