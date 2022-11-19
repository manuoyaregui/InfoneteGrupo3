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
        $usu = $this->getUsuarioPorEmail($email);
        if ($usu != null){
            $pass = $this->getUsuarioPorEmailYPassword($email,$password);
            if($pass != null)
                return true;
        }
        return false;
    }

    public function getUsuarioPorEmail($email){
        $sql = "SELECT * FROM usuario WHERE email='".$email."'" ;
        return $this->database->query($sql);
    }

    public function getUsuarioPorEmailYPassword($email,$password){
        $sql = "SELECT * FROM usuario where email LIKE '". $email."' and password  LIKE '". $password."'" ;
        return $this->database->query($sql);
    }

    public function getRolDeUsuarioPorEmail($email){
        $sql = "
            select rol.nombre
            from usuario join rol on usuario.idRol = rol.idRol
            where usuario.email like '". $email . "'" ;
        return $this->database->query($sql);
    }

    public function getIdUsuarioPorEmail($email){
        $sql = "SELECT idUsuario
                FROM usuario 
                WHERE email like '".$email."'";
        return $this->database->query($sql);
    }

}