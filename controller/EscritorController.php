<?php

class EscritorController
{
    private $render;
    private $productoModel;

    public function __construct($render, $productoModel){
        $this->render = $render;
        $this->productoModel = $productoModel;
    }

    public function execute(){
        $rolUsuario = $_SESSION['rol']? $_SESSION['rol']['nombre'] : false;
        if($rolUsuario == 'ESCRITOR' || $rolUsuario == 'ADMINISTRADOR' )
            echo $this->render->render("view/escritorView.mustache");
        else
            echo $this->render->redirect("/");
    }

    public function listarProductos() {
        $data["productos"] = $this->productoModel->listarProductos();

        echo $this->render->render("view/escritorView.mustache", $data);
    }

    public function editarProducto(){
        $id = $_GET["id"];

        if (isset($_POST["nombre"]) && isset($_POST["tipoProducto"]) && isset($_FILES["portada"]["name"])) {
            $nombre = $_POST["nombre"];
            $idTipo = $_POST["tipoProducto"];
            $portada = str_replace(" ", "-", $_FILES["portada"]["name"]);

            if (!empty($nombre) && !empty($idTipo)) {

                $nombreEnMayuscula = mb_strtoupper($nombre, 'utf-8');

                $resultado = $this->productoModel->editarProducto($id, $nombreEnMayuscula, $idTipo, $portada);

                if (!empty($portada)) {

                    move_uploaded_file($_FILES["portada"]["tmp_name"], "public/img/portadasDeProducto/" . $portada);

                }

            }

            if ($resultado) {
                echo $this->render->render("view/escritorView.mustache");
            }
        }

    }

    public function eliminarProducto() {
        $id = $_GET["id"];

        $resultado = $this->productoModel->eliminarProducto($id);

        if ($resultado) {
            header('Location: /escritor/listarProductos');
        }

    }

    public function llamarFormularioProducto() {
        $idProducto = $_GET["id"];

        $data["producto"] = $this->productoModel->getProductoPorId($idProducto);

        echo $this->render->render("view/editarProducto.mustache", $data);
    }


}