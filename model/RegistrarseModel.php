<?php

class RegistrarseModel
{

    public function __construct($database){
        $this->database = $database;
    }

    public function procesarFormularioRegistarseLector($nombre, $email, $password, $latitud, $longitud, $rol){
        if ($this->getUsuarioPorEmail($email)==null || !$this->getUsuarioPorEmail($email)){
            $resultado = $this->crearUsuario($nombre, $email, $password, $latitud, $longitud, $rol);

            return $resultado;
        }

    }

    public function getUsuarioPorEmail($email){
        $sql = "SELECT * FROM usuario WHERE email ='".$email."'" ;
        return $this->database->query($sql);
    }
    private function crearUsuario($nombre, $email, $password, $latitud, $longitud, $idRol){
        $sql = "INSERT INTO usuario (idUsuario,nombre, email, password, latitud, longitud, idRol, idEstado) 
             VALUES (null,'".$nombre."','".$email."','".$password."','".$latitud."', '".$longitud."', '".$idRol."','2')";
        return $this->database->execute($sql);
    }
}