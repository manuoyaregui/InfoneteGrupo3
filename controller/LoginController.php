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

        }else {
            $response = $this->loginModel->procesarFormularioLogin($email, $passwordCifrada);
            if ($response == 'ok') {
                $_SESSION["usuario"] = $email;
                // $_SESSION["idUsuario"] = $this->loginModel->getIdUsuarioPorEmail($email);
                $_SESSION["idUsuario"] = $this->loginModel->getUsuarioPorEmail($email)[0]["idUsuario"];
                $_SESSION["rol"] = $this->loginModel->getRolDeUsuarioPorEmail($email)[0];
                $usuario = $this->loginModel->getUsuarioPorEmail($email)[0];
                $this->getAndSaveWeatherData($usuario);
                header("Location:/infonete");
                exit();
            }
            else{
                $data["mensaje"] = $response;
                echo $this->render->render("view/login.mustache", $data) ;
            }
        }
    }


    public function Logout(){
        session_destroy();
        header("Location:/infonete");
        exit();
    }

    public function getAndSaveWeatherData($usuario){
        if( !empty($usuario['latitud']) &&  !empty($usuario['longitud']) ){
            $lat = $usuario['latitud'];
            $lon = $usuario['longitud'];

            $this->openWeather->saveDataInSession($lat,$lon);
        }

    }

}
