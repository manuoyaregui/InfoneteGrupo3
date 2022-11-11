<?php

class ArticuloModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function crearArticulo($idEdicion,$idSeccion,$titulo, $contenido, $latitud, $longitud) {
        $sql = "INSERT INTO articulo (titulo, descripcion, latitud, longitud)
                    VALUES ('".$titulo."', '".$contenido."', '".$latitud."', '".$longitud."')";
        if ($this->database->execute($sql)){
            /*la funcion fetch() transforma el resultado de la query en un array*/
            $idArticuloCreadoAnteriormente = $this->database->query("SELECT LAST_INSERT_ID()")->fetch();
            return $this->crearAsignacion($idEdicion,$idSeccion,$idArticuloCreadoAnteriormente);
        }
        return $this->database->execute($sql);
    }

    public function crearAsignacion($idEdicion,$idSeccion,$idArticuloCreadoAnteriormente){
        $sql = "INSERT INTO `edicion_seccion_articulos` (`idEdicion`, `idSeccion`, `idArticulo`) 
                VALUES ('$idEdicion', '$idSeccion', '$idArticuloCreadoAnteriormente')";
        return $this->database->execute($sql);
    }

}