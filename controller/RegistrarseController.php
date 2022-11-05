<?php

class RegistrarseController
{
    private $render;
    private $registrarseModel;

    public function __construct($registrarseModel,$render)
    {
        $this->registrarseModel = $registrarseModel;
        $this->render = $render;
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
        $rol = 1 ;

        if (!empty($nombre) && !empty($email) && !empty($passwordMD5) && !empty($latitud) && !empty($longitud) && !empty($rol)) {
            $resultado = $this->registrarseModel->procesarFormularioRegistarseLector($nombre, $email, $passwordMD5, $latitud, $longitud, $rol);

            if ($resultado){
                $data["mensaje"] = "Registrado correctamente";
                echo $this->render->render("view/login.mustache", $data);
            } else{
                $data["mensaje"] = "Ese mail ya esta registrado";
                echo $this->render->render("view/registroView.mustache", $data);
            }

        } else {
            $data["mensaje"] = "Los campos son obligatorios";
            echo $this->render->render("view/registroView.mustache", $data);
        }

    }
}