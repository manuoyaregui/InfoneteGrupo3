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
        if ($email==null){
            $data["mensaje"] = "Ingrese un email valido ";
            echo $this->render->render("view/login.mustache", $data) ;
        }elseif ( $password== null){
            $data["mensaje"] = "Ingrese una contraseña valida ";
            echo $this->render->render("view/login.mustache", $data) ;
        }else if ($this->loginModel->procesarFormularioLogin($email,$password) == 'ok'){
            $_SESSION["usuario"] = $email;
            echo $this->render->render("view/catalogoView.mustache");
        }else{
            $data["mensaje"] = "Usuario y/o contraseña incorrectos";
            echo $this->render->render("view/login.mustache", $data) ;
        }
    }
    public function Logout(){
        $_SESSION["usuario"] = "";
        header("Location:/infonete");
        exit();
    }

}