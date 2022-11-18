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
        $passwordCifrada = md5($_POST["password"]);

        if ($email == null){
            $data["mensaje"] = "Ingrese un email valido ";
            echo $this->render->render("view/login.mustache", $data);

        }elseif ($passwordCifrada == null){
            $data["mensaje"] = "Ingrese una contraseña valida ";
            echo $this->render->render("view/login.mustache", $data);

        }else if ($this->loginModel->procesarFormularioLogin($email,$passwordCifrada) == 'ok'){
            $_SESSION["usuario"] = $email;
            $_SESSION["idUsuario"] = $this->loginModel->getIdUsuarioPorEmail($email)[0];
            $_SESSION["rol"]= $this->loginModel->getRolDeUsuarioPorEmail($email)[0];
            header("Location:/infonete");
            exit();
        }else{
            $data["mensaje"] = "Usuario y/o contraseña incorrectos";
            echo $this->render->render("view/login.mustache", $data) ;
        }
    }


    public function Logout(){
        session_destroy();
        header("Location:/infonete");
        exit();
    }

}