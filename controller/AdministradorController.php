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
            $this->listarUsuarios();
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

    public function llamarFormEditarUsuario() {
        $idUsuario = $_GET["id"];
        $data["usuario"] = $this->usuarioModel->obtenerUsuarioPorId($idUsuario);

        echo $this->render->render("view/editarUsuario.mustache", $data);
    }

    public function editarUsuario() {
        $idUsuario = $_GET["id"];

        if (isset($_POST["rolUsuario"]) && isset($_POST["estadoUsuario"])) {
            $idRol = $_POST["rolUsuario"];
            $idEstado = $_POST["estadoUsuario"];

            $resultado = $this->usuarioModel->editarUsuario($idUsuario, $idRol, $idEstado);

            if ($resultado) {
                $this->render->redirect("/administrador/listarUsuarios");
            }

        }
    }

    public function listarArticulos(){
        //AGREGAR CODIGO EN EL MODEL ARTICULO PARA QUE FUNCIONE LISTAR
        $data["articulos"] = $this->articuloModel->listarTodosLosArticulos();

        echo $this->render->render("view/listarArticuloView.mustache", $data);
    }

    private function isAdmin():bool{
        return  isset( $_SESSION['rol'] ) &&
                $_SESSION['rol']['nombre'] === 'ADMINISTRADOR';
    }

}