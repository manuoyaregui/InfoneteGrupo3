<?php

class login
{
    private $render;
    private $loginModel;
    private $openWeather;

    public function __construct($loginModel,$render,$openWeather)
    {
        $this->loginModel = $loginModel;
        $this->render = $render;
        $this->openWeather = $openWeather;
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
            // $_SESSION["idUsuario"] = $this->loginModel->getIdUsuarioPorEmail($email);
            $_SESSION["idUsuario"] = $this->loginModel->getUsuarioPorEmail($email)[0]["idUsuario"];
            $_SESSION["rol"]= $this->loginModel->getRolDeUsuarioPorEmail($email)[0];

            $usuario = $this->loginModel->getUsuarioPorEmail($email)[0];
            $lat = $usuario['latitud'];
            $lon = $usuario['longitud'];
            $this->openWeather->saveDataInSession($lat,$lon);


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
