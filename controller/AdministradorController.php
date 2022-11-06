<?php

class AdministradorController
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
        if($rolUsuario === 'ADMINISTRADOR')
            echo $this->render->render("view/administradorView.mustache");
        else
            echo $this->render->redirect("/");
    }


    public function bajaProducto() {
        $id = $_GET["id"];
        $resultado = $this->productoModel->bloquearProducto($id);
        if ($resultado) {
            header('Location: /producto/listarProductos');
        }
    }

    public function altaProducto() {
        $id = $_GET["id"];
        $resultado = $this->productoModel->habilitarProducto($id);
        if ($resultado) {
            header('Location: /producto/listarProductos');
        }
    }
}