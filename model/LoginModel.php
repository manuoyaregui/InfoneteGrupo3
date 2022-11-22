<?php

class LoginModel
{

    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function procesarFormularioLogin($email,$password): string
    {
        $estadoDeVerificacion = "usuario y/o contraseña incorrectos";

        $usu = $this->getUsuarioPorEmail($email);
        if ($usu != null){
            $usuario = $this->getUsuarioPorEmailYPassword($email,$password);
            if($usuario != null){
                $estadoDeVerificacion = $usuario[0]['idEstado'] == 3 ? ("el usuario está bloqueado") :
                                        ($usuario[0]['idEstado'] == 1 ? ("el usuario está inactivo, verifique su correo electronico"):'ok');
            }

        }
        return $estadoDeVerificacion;
    }

    /*private function validarUsuarioPorEmailYPassword($email,$password){
        $usu = $this->getUsuarioPorEmail($email);
        if ($usu != null){
            $usuario = $this->getUsuarioPorEmailYPassword($email,$password);
            if($usuario != null){
                if($usuario['idEstado'] != 3)
                    return "ok";
                else
                    return "el usuario está bloqueado";
            }
        }
        return false;
    }*/

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