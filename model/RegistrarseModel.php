<?php

class RegistrarseModel
{

    public function __construct($database){
        $this->database = $database;
    }

    public function procesarFormularioRegistarseLector($nombre, $email, $password, $latitud, $longitud, $rol, $hash){
        if ($this->getUsuarioPorEmail($email)==null || !$this->getUsuarioPorEmail($email)){
            $resultado = $this->crearUsuario($nombre, $email, $password, $latitud, $longitud, $rol, $hash);

            return $resultado;
        }

    }

    public function getUsuarioPorEmail($email){
        $sql = "SELECT * FROM usuario WHERE email ='".$email."'" ;
        return $this->database->query($sql);
    }

    private function crearUsuario($nombre, $email, $password, $latitud, $longitud, $idRol, $hash){
        $sql = "INSERT INTO usuario (nombre, email, password, latitud, longitud, idRol, hashVerificacion, idEstado) 
             VALUES ('".$nombre."','".$email."','".$password."','".$latitud."', '".$longitud."', '".$idRol."', '".$hash."', 2)";
        return $this->database->execute($sql);
    }

    public function activarUsuario($email, $hash) {
        $sql = "UPDATE usuario SET idEstado = 1 WHERE email = " . $email . " AND hashVerificacion = " . $hash;
        return $this->database->execute($sql);
    }

}