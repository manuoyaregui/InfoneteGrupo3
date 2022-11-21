<?php

class EditorController
{
    private $render;
    private $productoModel;
    private $edicionModel;
    private $articuloModel;

    public function __construct($render ,$productoModel ,$edicionModel ,$articuloModel){
        $this->render = $render;
        $this->productoModel = $productoModel;
        $this->edicionModel = $edicionModel;
        $this->articuloModel = $articuloModel;
    }

    public function execute(){
        $rolUsuario = $_SESSION['rol']? $_SESSION['rol']['nombre'] : false;
        if($rolUsuario === 'EDITOR')
            echo $this->render->render("view/editorView.mustache");
        else
            echo $this->render->redirect("/");
    }

    public function listarEdiciones() {
        //AGREGAR CODIGO EN EL MODEL EDICION PARA QUE FUNCIONE LISTAR
        $data["ediciones"] = $this->edicionModel->listarEdiciones();

        echo $this->render->render("view/listarEdicionView.mustache", $data);
    }

    public function aprobarEdicion(){
        $idSeccion = $_GET['idSeccion'];



        $this->execute();
    }

    public function listarArticulos(){
        //AGREGAR CODIGO EN EL MODEL ARTICULO PARA QUE FUNCIONE LISTAR
        $data["articulos"] = $this->articuloModel->listarTodosLosArticulos();

        echo $this->render->render("view/listarArticuloView.mustache", $data);
    }

}