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
        echo $this->render->render("view/login.mustache");
    }

    public function FormularioLogin(){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($this->loginModel->procesarFormularioLogin($email,$password) == 'ok'){
            echo $this->render->render("view/lector.mustache");
        }
        
        $this->execute();
    }
}