<?php

class ArticuloModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function crearArticulo($idEdicion,$idSeccion,$titulo, $contenido, $latitud, $longitud) {
        $sql = "INSERT INTO articulo (idArticulo,titulo, descripcion, latitud, longitud)
                    VALUES (null,'".$titulo."', '".$contenido."', '".$latitud."', '".$longitud."');
                SELECT LAST_INSERT_ID()";
        $idPrev = $this->database->query($sql);
        return $this->crearAsignacion($idEdicion,$idSeccion,$idPrev);
    }

    public function crearAsignacion($idEdicion,$idSeccion,$idArticuloCreadoAnteriormente){
        $sql = "INSERT INTO `edicion_seccion_articulos` (`idEdicion`, `idSeccion`, `idArticulo`) 
                VALUES ('$idEdicion', '$idSeccion', '$idArticuloCreadoAnteriormente')";
        return $this->database->execute($sql);
    }

}