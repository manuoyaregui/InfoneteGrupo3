<?php

class EscritorController
{
    private $render;

    public function __construct($render){
        $this->render = $render;
    }

    public function execute(){
        $rolUsuario = $_SESSION['rol']? $_SESSION['rol']['nombre'] : false;
        if($rolUsuario == 'ESCRITOR' || $rolUsuario == 'ADMINISTRADOR' )
            echo $this->render->render("view/escritorView.mustache");
        else
            echo $this->render->redirect("/");
    }




}