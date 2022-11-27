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
    private $domPDF;

    public function __construct($render, $productoModel, $edicionModel, $articuloModel, $usuarioModel, $mailer, $registrarseModel, $suscripcionYCompraModel, $domPDF){
        $this->render = $render;
        $this->productoModel = $productoModel;
        $this->edicionModel = $edicionModel;
        $this->articuloModel = $articuloModel;
        $this->usuarioModel = $usuarioModel;
        $this->mailer = $mailer;
        $this->registrarseModel = $registrarseModel;
        $this->suscripcionYCompraModel = $suscripcionYCompraModel;
        $this->domPDF = $domPDF;
    }

    public function execute(){
        if( !$this->isAdmin() ) $this->render->redirect('/');
        echo $this->render->render('view/administradorView.mustache');
        //listarAccionesQuePuedeHacer

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

        echo $this->render->render("view/listarUsuariosView.mustache", $data);
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

    public function verGraficas() {
        $data["productos"] = $this->suscripcionYCompraModel->cantidadSuscripcionesPorProducto();
        $data["suscripciones"] = $this->suscripcionYCompraModel->cantidadSuscripcionesPorDia();
        $data["ediciones"] = $this->suscripcionYCompraModel->cantidadComprasPorEdicion();

        echo $this->render->render("view/graficas.mustache", $data);
    }

    public function imprimirContenidistas() {
        $data["contenidistas"] = $this->usuarioModel->listarContenidistas();

        $html = $this->render->render("view/reporteContenidistas.mustache", $data);

        $this->domPDF->imp($html);
    }

    public function imprimirClientesSuscriptos() {
        $data["clientesSuscriptos"] = $this->suscripcionYCompraModel->listarClientesSuscriptos();

        $html = $this->render->render("view/reporteClientesSuscriptos.mustache", $data);

        $this->domPDF->imp($html);
    }

    public function imprimirSuscripcionesDeProductos() {
        $data["suscripciones"] = $this->suscripcionYCompraModel->listarSuscripciones();

        $html = $this->render->render("view/reporteSuscripciones.mustache", $data);

        $this->domPDF->imp($html);
    }

    public function imprimirEdicionesVendidas() {
        $data["edicionesVendidas"] = $this->suscripcionYCompraModel->listarEdicionesVendidas();

        $html = $this->render->render("view/reporteEdicionesVendidas.mustache", $data);

        $this->domPDF->imp($html);
    }


}