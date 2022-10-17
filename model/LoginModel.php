<?php

class LoginModel
{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function procesarFormularioLogin($email,$password): string
    {
      if ($this->validarUsuarioPorEmailYPassword($email,$password)){
          return "ok";
      }
      return "error";
    }

    private function validarUsuarioPorEmailYPassword($email,$password){
        $usuario = $this->getUsuarioPorEmailYPassword($email,$password);

        if ($usuario != null){
            return true;
        }

        return false;
    }

    public function getUsuarioPorEmail($email){
        $sql = "SELECT * FROM usuario WHERE email='".$email."'" ;
        return $this->database->query($sql);
    }

    public function getUsuarioPorEmailYPassword($email, $password){
        $sql = "SELECT * FROM usuario WHERE email = '" . $email . "' AND password = '" . $password . "'";

        return $this->database->query($sql);
    }


}
