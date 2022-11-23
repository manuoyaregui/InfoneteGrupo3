<?php

class AdministradorController
{
    private $render;
    private $productoModel;
    private $edicionModel;
    private $articuloModel;
    private $usuarioModel;
    private $mailer;
    private $registrarseModel;
    private $suscripcionYCompraModel;

    public function __construct($render, $productoModel, $edicionModel, $articuloModel, $usuarioModel, $mailer, $registrarseModel, $suscripcionYCompraModel){
        $this->render = $render;
        $this->productoModel = $productoModel;
        $this->edicionModel = $edicionModel;
        $this->articuloModel = $articuloModel;
        $this->usuarioModel = $usuarioModel;
        $this->mailer = $mailer;
        $this->registrarseModel = $registrarseModel;
        $this->suscripcionYCompraModel = $suscripcionYCompraModel;
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

    public function llamarFormCrearUsuario(){
        echo $this->render->render("view/formUsuarioAdmin.mustache");
    }

    public function crearUsuarios()
    {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $passwordMD5 = md5($_POST["password"]);
        $rol = $_POST["rol"];
        $hash = md5(time());

        if (!empty($nombre) && !empty($email) && !empty($passwordMD5) && !empty($rol)) {
            $resultado = $this->registrarseModel->procesarFormularioRegistro($nombre, $email, $passwordMD5, $rol, $hash);

            if ($resultado) {
                $data["mensajeActivacion"] = "Se envio un enlace de activacion al mail " . $email;

                $mensajeActivacion = "<h1>Haz clic en el siguiente enlace para activar tu cuenta</h1>
                                      <a href='http://localhost/registrarse/activarUsuario/email=$email&hash=$hash'>Activar cuenta</a>";
                $this->mailer->enviarMail($email, "Activacion de cuenta en Infonete", $mensajeActivacion);

                echo $this->render->render("view/formUsuarioAdmin.mustache", $data);
            } else {
                $data["mensaje"] = "Ese mail ya esta registrado";
                echo $this->render->render("view/formUsuarioAdmin.mustache", $data);
            }
        }
    }

    public function verReportes() {
        $data["productos"] = $this->suscripcionYCompraModel->cantidadSuscripcionesPorProducto();
        $data["suscripciones"] = $this->suscripcionYCompraModel->cantidadSuscripcionesTotales();
        $data["ediciones"] = $this->suscripcionYCompraModel->cantidadComprasPorEdicion();

        echo $this->render->render("view/reportes.mustache", $data);
    }

}