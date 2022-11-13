<?php

class ArticuloModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function crearArticulo($idEdicion,$idSeccion,$titulo, $contenido, $latitud, $longitud) {
        $sql = "INSERT INTO articulo (idArticulo,titulo, descripcion, latitud, longitud)
                    VALUES (null,'".$titulo."', '".$contenido."', '".$latitud."', '".$longitud."')";
        $result = $this->database->execute($sql);

        if($result){
        $idPrev = $this->database->lastID();
        return $this->crearAsignacion($idEdicion,$idSeccion,$idPrev);}

        return $result;
    }

    public function crearAsignacion($idEdicion,$idSeccion,$idArticuloCreadoAnteriormente){
        $sql = "INSERT INTO `edicion_seccion_articulos` (`idEdicion`, `idSeccion`, `idArticulo`) 
                VALUES ('$idEdicion','$idSeccion','$idArticuloCreadoAnteriormente')";
        return $this->database->execute($sql);
    }

    public function listarArticulosPorEdicion($idProducto,$idEdicion){
        $sql = "SELECT a.titulo, a.descripcion, idEdicion 
                FROM articulo a join edicion_seccion_articulos esa on a.idArticulo = esa.idArticulo
                WHERE esa.idEdicion = ".$idEdicion." and EXISTS(
									                SELECT idEdicion
									                FROM producto p join edicion e on p.idProducto=e.idProducto
									                WHERE p.idProducto = ".$idProducto.")";
        return $this->database->query($sql);

    }
}