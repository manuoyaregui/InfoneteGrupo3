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
        /*$sql = "SELECT a.titulo, a.descripcion, idEdicion
                FROM articulo a join edicion_seccion_articulos esa on a.idArticulo = esa.idArticulo
                WHERE esa.idEdicion = ".$idEdicion." and EXISTS(
									                SELECT idEdicion
									                FROM producto p join edicion e on p.idProducto=e.idProducto
									                WHERE p.idProducto = ".$idProducto.")";*/
        $sql = "SELECT art.titulo, art.descripcion, ed.idEdicion, sec.nombre AS seccion
                    FROM edicion_seccion_articulos esa
                        JOIN articulo art ON art.idArticulo = esa.idArticulo
                        JOIN edicion ed ON ed.idEdicion = esa.idEdicion
                        JOIN producto pr ON pr.idProducto = ed.idProducto
                        JOIN seccion sec ON sec.idSeccion = esa.idSeccion
                    WHERE pr.idProducto = '$idProducto' AND ed.idEdicion = '$idEdicion'";
        return $this->database->query($sql);

    }
}