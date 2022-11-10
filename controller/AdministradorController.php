<?php

class AdministradorController
{
    private $render;
    private $productoModel;
    private $edicionModel;
    private $articuloModel;
    private $usuarioModel;

    public function __construct($render, $productoModel, $edicionModel, $articuloModel, $usuarioModel){
        $this->render = $render;
        $this->productoModel = $productoModel;
        $this->edicionModel = $edicionModel;
        $this->articuloModel = $articuloModel;
        $this->usuarioModel = $usuarioModel;
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

    public function listarUsuarios() {
        $data["usuarios"] = $this->usuarioModel->listarUsuarios();

        echo $this->render->render("view/administradorView.mustache", $data);
    }


}