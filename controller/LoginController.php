<?php

class login
{
    private $render;
    private $loginModel;

    public function __construct($loginModel,$render)
    {
        $this->loginModel = $loginModel;
        $this->render = $render;
    }

    public function execute()
    {
        $data = array("mensaje" => 'hola pepe');
        echo $this->render->render("view/login.mustache", $data);
    }

    public function FormularioLogin(){
        $email = $_GET["email"];
        $password=$_GET["password"];

        if ($this->loginModel->procesarFormularioLogin($email,$password) == 'ok'){
            echo $this->render->render("view/lector.mustache");
        }else
            $this->execute();
    }
}