<?php

class RegistrarseModel
{

    public function __construct($database){
        $this->database = $database;
    }

    public function procesarFormularioRegistarseLector($nombre,$email,$password,$direccion,$rol){
     if ($this->getUsuarioPorEmail($email)==null || !$this->getUsuarioPorEmail($email)){
        $resultado = $this->crearUsuario($nombre, $email, $password, $direccion, $rol);

        return $resultado;
     }

    }

    public function getUsuarioPorEmail($email){
        $sql = "SELECT * FROM usuario WHERE email ='".$email."'" ;
        return $this->database->query($sql);
    }
    private function crearUsuario($nombre, $email, $password, $direccion, $rol){
        $sql = "INSERT INTO usuario (id,nombre, email, password, direccion, id_rol) 
             VALUES (null,'".$nombre."','".$email."','".$password."','".$direccion."','".$rol."')";
        return $this->database->execute($sql);
    }
}