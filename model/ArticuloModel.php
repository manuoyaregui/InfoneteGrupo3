<?php

class ArticuloModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function crearArticulo($idEdicion,$idSeccion,$portadaArticulo,$titulo,$subtitulo, $contenido, $latitud, $longitud) {
        $sql = "INSERT INTO articulo (idArticulo,titulo,portadaArticulo,subtitulo, descripcion, latitud, longitud, idEstado)
                    VALUES (null,'".$titulo."','$portadaArticulo','".$subtitulo."', '".$contenido."', '".$latitud."', '".$longitud."', 1)";
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
        $sql = "SELECT art.titulo, art.portadaArticulo, art.subtitulo, art.idArticulo, ed.idEdicion, sec.nombre AS seccion, pr.idProducto
                    FROM edicion_seccion_articulos esa
                        JOIN articulo art ON art.idArticulo = esa.idArticulo
                        JOIN edicion ed ON ed.idEdicion = esa.idEdicion
                        JOIN producto pr ON pr.idProducto = ed.idProducto
                        JOIN seccion sec ON sec.idSeccion = esa.idSeccion
                        JOIN estado es ON es.idEstado = art.idEstado
                    WHERE pr.idProducto = '$idProducto' AND ed.idEdicion = '$idEdicion' AND es.nombre = 'ACTIVO'";
        return $this->database->query($sql);
    }

    public function getArticuloYSeccionPorId($idArticulo){
        $sql = "SELECT art.*, sec.nombre AS nombreSeccion
                    FROM edicion_seccion_articulos esa
                        JOIN articulo art ON art.idArticulo = esa.idArticulo
                        JOIN seccion sec ON sec.idSeccion = esa.idSeccion
                    WHERE art.idArticulo = ".$idArticulo;
        return $this->database->query($sql);
    }

    public function listarTodosLosArticulos(){
        $sql = "SELECT art.titulo, art.portadaArticulo, art.subtitulo, art.idArticulo, ed.idEdicion, sec.nombre AS seccion, es.nombre AS estado
                    FROM edicion_seccion_articulos esa
                        JOIN articulo art ON art.idArticulo = esa.idArticulo
                        JOIN edicion ed ON ed.idEdicion = esa.idEdicion
                        JOIN producto pr ON pr.idProducto = ed.idProducto
                        JOIN seccion sec ON sec.idSeccion = esa.idSeccion
                        JOIN estado es ON es.idEstado = art.idEstado";
        return $this->database->query($sql);
    }

    public function getTernariaPorIdArticulo($idArticulo){
        $sql = "SELECT esa.*, art, sec
                FROM edicion_seccion_articulos esa
                JOIN articulo art ON art.idArticulo = esa.idArticulo
                JOIN seccion sec ON sec.idSeccion = esa.idSeccion
                WHERE art.idArticulo = ".$idArticulo;
        return $this->database->query($sql);
    }

    public function editarArticulo($idArticulo,$newData = array()){
        $sql = "
            UPDATE articulo
            set titulo = '".$newData['titulo']."',
                subtitulo = '".$newData['subtitulo']."', 
                descripcion = '". $newData['descripcion']."',
                latitud = '".$newData['latitud']."',
                longitud = '".$newData['longitud']."'
            where idArticulo = '".$idArticulo."'";

        return $this->database->execute($sql);
    }

    public function aprobarArticulo($idArticulo) {
        $sql = "UPDATE articulo
                    SET idEstado = 2
                WHERE idArticulo = '$idArticulo'";
        return $this->database->execute($sql);
    }

    public function desaprobarArticulo($idArticulo) {
        $sql = "UPDATE articulo
                    SET idEstado = 1
                WHERE idArticulo = '$idArticulo'";
        return $this->database->execute($sql);
    }

}