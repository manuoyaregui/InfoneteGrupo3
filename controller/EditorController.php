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
        $this->isEditor();
        echo $this->render->render("view/editorView.mustache");
    }

    public function listarEdiciones() {
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

    private function isEditor(){
        if( ! isset( $_SESSION['rol'] ) ||
            $_SESSION['rol']['nombre'] != 'EDITOR'){
            $this->render->redirect("/");
        }
    }
}