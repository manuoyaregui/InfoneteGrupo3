<?php

    class UsuarioModel {

        private $database;

        public function __construct($database) {
            $this->database = $database;
        }

        public function listarUsuarios() {
            $sql = "SELECT u.*, r.nombre AS rol, e.nombre AS estado 
                        FROM usuario u JOIN rol r ON r.idRol = u.idRol
                                       JOIN estado e ON e.idEstado = u.idEstado";
            return $this->database->query($sql);
        }

        public function obtenerUsuarioPorId($idUsuario) {
            $sql = "SELECT u.*, r.idRol AS idRol, r.nombre AS rol, e.idEstado AS idEstado, e.nombre AS estado
                        FROM usuario u JOIN rol r ON r.idRol = u.idRol
                                       JOIN estado e ON e.idEstado = u.idEstado
                    WHERE u.idUsuario = " . $idUsuario;

            return $this->database->query($sql);
        }

        public function editarUsuario($idUsuario, $idRol, $idEstado) {
            $sql = "UPDATE usuario 
                        SET idRol = '$idRol', idEstado = '$idEstado' 
                    WHERE idUsuario = '$idUsuario'";
            return $this->database->execute($sql);
        }


    }