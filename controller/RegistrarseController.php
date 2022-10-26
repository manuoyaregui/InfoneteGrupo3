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
        echo $this->render->render("view/quieroSerParteView.mustache");
    }

    public function procesarFormularioRegistrarseLector(){
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $passwordMD5 = md5($_POST["password"]);
        $direccion = $_POST["direccion"];
        $rol = 1 ;
        $resultado = $this->registrarseModel->procesarFormularioRegistarseLector($nombre,$email,$passwordMD5,$direccion,$rol);

        if ($resultado){
            $data["mensaje"]="Registrado correctamente";
            echo $this->render->render("view/inicio.mustache",$data);
        } else{
            $data["mensaje"]="Ese mail ya esta registrado";
            echo $this->render->render("view/quieroSerParteView.mustache",$data);
        }
    }
}