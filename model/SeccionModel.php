<?php

class SeccionModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function crearSeccion($nombreSeccion): string
    {
        $estado = "error";

        //ver si ya existe
        $yaExisteLaSeccion =  $this->database->query("select * from seccion where nombre = '". $nombreSeccion ."'")[0] != null;
        if(! $yaExisteLaSeccion){
            $query = "insert into Seccion(nombre) values ('". $nombreSeccion."')";
            $this->database->execute($query);
            $estado = "ok";
        }
        return $estado;
    }

    public function listarSecciones(){
        $consulta="select * from seccion";

        return $this->database->query($consulta);
    }

    public function getSeccionById($idSeccion){
        return $this->database->query("select * from seccion where idSeccion = ".$idSeccion)[0];
    }

    public function editarSeccion($idSeccion,$nuevoNombre){
       if( !empty($nuevoNombre) ){
           $update = "
                        update seccion 
                        set nombre = '".$nuevoNombre."'
                        where idSeccion = ". $idSeccion;

           $this->database->execute($update);
       }
    }

}