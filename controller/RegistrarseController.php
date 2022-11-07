<?php

class RegistrarseController
{
    private $render;
    private $registrarseModel;
    private $mailer;

    public function __construct($registrarseModel, $render, $mailer)
    {
        $this->registrarseModel = $registrarseModel;
        $this->render = $render;
        $this->mailer = $mailer;
    }

    public function execute()
    {
        echo $this->render->render("view/registroView.mustache");
    }

    public function procesarFormularioRegistrarseLector(){
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $passwordMD5 = md5($_POST["password"]);
        $latitud = $_POST["latitud"];
        $longitud = $_POST["longitud"];
        $rol = 1;
        $hash = md5(time());

        if (!empty($nombre) && !empty($email) && !empty($passwordMD5) && !empty($latitud) && !empty($longitud) && !empty($rol)) {
            $resultado = $this->registrarseModel->procesarFormularioRegistarseLector($nombre, $email, $passwordMD5, $latitud, $longitud, $rol, $hash);

            if ($resultado){
                $data["mensajeActivacion"] = "Se envio un enlace de activacion al mail " . $email;

                $mensajeActivacion = "<h1>Haz click en el siguiente enlace para activar tu cuenta</h1>
                                      <a href='http://localhost/registrarse/activarUsuario/email=$email&hash=$hash'>Activar cuenta</a>";
                $this->mailer->enviarMail($email, "Activacion de cuenta en Infonete", $mensajeActivacion);

                echo $this->render->render("view/registroView.mustache", $data);
            } else{
                $data["mensaje"] = "Ese mail ya esta registrado";
                echo $this->render->render("view/registroView.mustache", $data);
            }

        } else {
            $data["mensaje"] = "Los campos son obligatorios";
            echo $this->render->render("view/registroView.mustache", $data);
        }

    }

    public function activarUsuario() {
        $email = $_GET["email"];
        $hash = $_GET["hash"];

        $resultado = $this->registrarseModel->activarUsuario($email, $hash);

        if ($resultado) {
            echo $this->render->render("login.mustache");
        }
    }

}