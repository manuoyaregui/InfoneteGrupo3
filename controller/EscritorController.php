<?php

class EscritorController
{
    private $render;
    private $productoModel;
    private $edicionModel;
    private $articuloModel;
    private $seccionModel;

    public function __construct($render ,$productoModel ,$edicionModel ,$articuloModel,$seccionModel){
        $this->render = $render;
        $this->productoModel = $productoModel;
        $this->edicionModel = $edicionModel;
        $this->articuloModel = $articuloModel;
        $this->seccionModel = $seccionModel;
    }

    public function execute($data = array()){
        $rolUsuario = $_SESSION['rol']? $_SESSION['rol']['nombre'] : false;
        if($rolUsuario === 'ESCRITOR')
            echo $this->render->render("view/escritorView.mustache",$data);
        else
            echo $this->render->redirect("/");
    }

    public function llamarFormCrearProducto(){
        echo $this->render->render("view/crearProductoView.mustache");
    }

    public function crearProducto(){

        if (isset($_POST["nombre"], $_POST["tipoProducto"], $_FILES["portada"]["name"], $_SESSION['idUsuario'])) {
            $idUsuario = $_SESSION['idUsuario'];
            $nombre = $_POST["nombre"];
            $idTipo = $_POST["tipoProducto"];
            $portada = str_replace(" ", "-", $_FILES["portada"]["name"]);
            $precioSuscripcion = $_POST["precioSuscripcion"];

            if (!empty($nombre) && !empty($idTipo)) {

                $nombreEnMayuscula = mb_strtoupper($nombre, 'utf-8');
                // TODO: modificar la base de datos
                $resultado = $this->productoModel->crearProducto($nombreEnMayuscula, $idTipo, $portada, $precioSuscripcion, $idUsuario);

                if (!empty($portada)) {

                    move_uploaded_file($_FILES["portada"]["tmp_name"], "public/img/portadasDeProducto/" . $portada);

                }

            }

            if ($resultado) {
                header('Location: /escritor/listarProductos');
                //exit();
            }

        }
    }



    public function editarProducto(){
        $id = $_GET["id"];

        if (isset($_POST["nombre"]) && isset($_POST["tipoProducto"]) && isset($_FILES["portada"]["name"])) {
            $nombre = $_POST["nombre"];
            $idTipo = $_POST["tipoProducto"];
            $portada = str_replace(" ", "-", $_FILES["portada"]["name"]);
            $precioSuscripcion = $_POST["precioSuscripcion"];

            if (!empty($nombre) && !empty($idTipo)) {

                $nombreEnMayuscula = mb_strtoupper($nombre, 'utf-8');
                $resultado = $this->productoModel->editarProducto($id, $nombreEnMayuscula, $idTipo, $portada, $precioSuscripcion);

                if (!empty($portada)) {
                    move_uploaded_file($_FILES["portada"]["tmp_name"], "public/img/portadasDeProducto/" . $portada);
                }
            }
            if ($resultado) {
                echo $this->render->render("view/escritorView.mustache");
            }
        }
    }


    public function llamarFormularioProducto() {
        $idProducto = $_GET["id"];

        $data["producto"] = $this->productoModel->getProductoPorId($idProducto);

        echo $this->render->render("view/editarProducto.mustache", $data);
    }

    public function llamarFormularioEdicion() {
        $idEdicion = $_GET["id"];

        $data["edicion"] = $this->edicionModel->getEdicionPorId($idEdicion);
        $data["productos"] = $this->productoModel->listarProductos();

        echo $this->render->render("view/editarEdicionView.mustache", $data);
    }
    public function llamarFormCrearEdicion(){
        $data["productos"] = $this->productoModel->listarProductos();

        echo $this->render->render("view/crearEdicionView.mustache", $data);
    }

    public function listarEdiciones() {
        //AGREGAR CODIGO EN EL MODEL EDICION PARA QUE FUNCIONE LISTAR
        $data["ediciones"] = $this->edicionModel->listarEdiciones();

        echo $this->render->render("view/listarEdicionView.mustache", $data);
    }

    public function crearEdicion(){
        //AGREGAR
        if ( isset( $_POST["numeroEdicion"],
                    $_FILES["portadaEdicion"]["name"],
                    $_POST["precioEdicion"],
                    $_POST["idProducto"],
                    $_POST["fechaEdicion"]) ) {

            $portadaEdicion = str_replace(" ", "-", $_FILES["portadaEdicion"]["name"]);
            $fechaEdicion = $_POST["fechaEdicion"];
            $numeroEdicion = $_POST["numeroEdicion"];
            $precioEdicion = $_POST["precioEdicion"];
            $idProducto = $_POST["idProducto"];

            if (!empty($numeroEdicion) && !empty($precioEdicion) && !empty($idProducto)) {

                $resultado = $this->edicionModel->crearEdicion($numeroEdicion, $portadaEdicion, $precioEdicion, $idProducto, $fechaEdicion);

                if (!empty($portadaEdicion)) {
                    move_uploaded_file($_FILES["portadaEdicion"]["tmp_name"], "public/img/portadasDeEdicion/" . $portadaEdicion);
                }

            }

            if ($resultado) {
                header('Location: /escritor/listarEdiciones');
                //exit();
            } else{
                $data ["mensaje"] = "Esa edicion ya existe.";
                $data ["listaDeEdiciones"] = $this->edicionModel->listaDeEdicionesDeUnProducto($idProducto);
                $data["productos"] = $this->productoModel->listarProductos();
                echo $this->render->render("view/crearEdicionView.mustache", $data);
            }
        }
        else{
            $data['formError'] = "Por favor rellena todos los campos.";
            $data["productos"] = $this->productoModel->listarProductos();
            echo $this->render->render("view/crearEdicionView.mustache", $data);
        }
    }

    /*public function crearEdicionModal(){
        //AGREGAR
        if ( isset( $_POST["numeroEdicion"],
            $_POST["precioEdicion"],
            $_POST["idProducto"],
            $_POST["fechaEdicion"]) ) {

            $fechaEdicion = $_POST["fechaEdicion"];
            $numeroEdicion = $_POST["numeroEdicion"];
            $precioEdicion = $_POST["precioEdicion"];
            $idProducto = $_POST["idProducto"];

            if (!empty($numeroEdicion) && !empty($precioEdicion) && !empty($idProducto)) {

                $resultado = $this->edicionModel->crearEdicion($numeroEdicion, $precioEdicion, $idProducto,$fechaEdicion);

            }

            if ($resultado) {
               return  $data ["mensaje"] = "Edicion creada exitosamente.";
            } else{
                $data ["mensaje"] = "Esa edicion ya existe.";
                $data ["listaDeEdiciones"] = $this->edicionModel->listaDeEdicionesDeUnProducto($idProducto);
                $data ["productos"] = $this->productoModel->listarProductos();
                return $this->render->render("escritor/llamarFormCrearArticulo", $data);
            }
        }
        else{
            $data['formError'] = "Por favor rellena todos los campos.";
            echo $this->render->render("escritor/llamarFormCrearArticulo", $data);
        }
    }*/

    public function editarEdicion(){
        $idEdicion = $_GET["id"];
        if (isset($_POST["numeroEdicion"]) && isset($_POST["precioEdicion"]) && isset($_POST["idProducto"])) {

            $numeroEdicion = $_POST["numeroEdicion"];
            $precioEdicion = $_POST["precioEdicion"];
            $idProducto = $_POST["idProducto"];

            if (!empty($numeroEdicion) && !empty($precioEdicion) && !empty($idProducto)) {

                $resultado = $this->edicionModel->editarEdicion($idEdicion, $numeroEdicion, $precioEdicion, $idProducto);

            }

            if ($resultado) {
                header('Location: /escritor/listarEdiciones');
                exit();
            } else{
                $data ["mensaje"] = "Esa edicion ya existe.";
                $data ["listaDeEdiciones"] = $this->edicionModel->listaDeEdicionesDeUnProducto($idProducto);
                $data["productos"] = $this->productoModel->listarProductos();
                echo $this->render->render("view/crearEdicionView.mustache", $data);
            }
        }
    }

    public function llamarFormCrearArticulo(){
        $data["productos"] = $this->productoModel->listarProductos();
        $data["secciones"] = $this->seccionModel->listarSecciones();
        echo $this->render->render("view/crearArticuloView.mustache",$data);
    }

    public function listarArticulos() {
        //AGREGAR CODIGO EN EL MODEL ARTICULO PARA QUE FUNCIONE LISTAR
        $data["articulos"] = $this->articuloModel->listarTodosLosArticulos();

        echo $this->render->render("view/listarArticuloView.mustache", $data);
    }

    public function crearArticulo(){
        $idProducto = $_POST["idProducto"];
        $idEdicion = $_POST["idEdicion"];
        $idSeccion = $_POST["idSeccion"];
        $titulo = $_POST["titulo-articulo"];
        $subtitulo = $_POST["subtitulo-articulo"];
        $contenido = $_POST["descripcion-articulo"];
        $latitud = $_POST["latitud"];
        $longitud = $_POST["longitud"];


        $existeProducto = $this->productoModel->getProductoPorId($idProducto);
        $existeEdicion = $this->edicionModel->getEdicionPorId($idEdicion);
        $existeSeccion = $this->seccionModel->getSeccionById($idSeccion);
        if (!empty($existeProducto) && !empty($existeEdicion) && !empty($existeSeccion)) {
            if (isset($_FILES["portadaArticulo"]["name"]) && !empty($titulo) && !empty($subtitulo) && !empty($contenido) && !empty($latitud) && !empty($longitud)) {
                $portadaArticulo = str_replace(" ", "-", $_FILES["portadaArticulo"]["name"]);

                $resultado = $this->articuloModel->crearArticulo($idEdicion,$idSeccion,$portadaArticulo,$titulo,$subtitulo, $contenido, $latitud, $longitud);

                if (!empty($portadaArticulo)) {

                    move_uploaded_file($_FILES["portadaArticulo"]["tmp_name"], "public/img/portadasDeArticulos/" . $portadaArticulo);

                }

                if ($resultado) {
                    $data["mensaje"] = "Se creo el articulo " . $titulo;
                    $data["productos"] = $this->productoModel->listarProductos();
                    $data["secciones"] = $this->seccionModel->listarSecciones();
                    echo $this->render->render("view/crearArticuloView.mustache", $data);
                }

            }
        }
        $data["productos"] = $this->productoModel->listarProductos();
        $data["secciones"] = $this->seccionModel->listarSecciones();
        $data["mensajeError"] = "No se pudo crear el articulo " . $titulo;
        echo $this->render->render("view/crearArticuloView.mustache", $data);
    }
    public function llamarFormularioEditarArticulo(){
        $idArticulo = $_GET['id'];

        //Obtengo el articulo
        $articuloObtenido = $this->articuloModel->getArticuloYSeccionPorId($idArticulo)[0];
        $data['articulo'] = $articuloObtenido;
        //$data['producto'] = $this->productoModel->getP
        //los guardo en data


        //Lleno los campos de la vista

        //el submit que llame a 'editarArticulo'
        echo $this->render->render("view/editarArticuloView.mustache",$data);

    }

    public function editarArticulo(){
        $this->isEscritor();

        $idArticulo = $_GET['id'];
        $newData['titulo'] = $_POST["titulo-articulo"]?:"";
        $newData['subtitulo'] = $_POST["subtitulo-articulo"]?:"";
        $newData['descripcion'] = $_POST['descripcion-articulo']?:"";
        $newData['latitud'] = $_POST['latitud']?:"";
        $newData['longitud'] = $_POST['longitud']?:"";

        if ($this->articuloModel->editarArticulo($idArticulo,$newData)){
            $data['mensaje'] = "Artículo editado correctamente.";
        }
        else{
            $data['mensaje'] = "No se pudo editar el artículo.";
        }
            $this->execute($data);

    }

    public function getEdiciones(){
        //obtengo el id por POST
        //obtengo las ediciones del producto
        //le paso por echo el html a imprimir

        $idProducto = $_POST['producto'];

        $edicionesObtenidas = $this->edicionModel->listaDeEdicionesDeUnProducto($idProducto);

        foreach ($edicionesObtenidas as $edicion){
            echo "<option value = '". $edicion['idEdicion']."'>" . $edicion['numero'] . "</option>";
        }
    }


    public function llamarFormCrearSeccion(){
        $this->isEscritor();
        echo $this->render->render("view/crearSeccionView.mustache");
    }

    public function crearSeccion(){
        $nombreSeccion = $_POST['nombre-seccion'];
        if($this->seccionModel->crearSeccion($nombreSeccion) == "ok"){
            $this->render->redirect("/escritor/listarSecciones");

        }else{
            $data['mensaje'] = "La sección ya existe";
            echo $this->render->render("view/crearSeccionView.mustache", $data);
        }

        //AGREGAR CODIGO
    }


    public function getSecciones(){
        $seccionesObtenidas = $this->seccionModel->listarSecciones();
        foreach ($seccionesObtenidas as $seccion){
            echo "<option value ='". $seccion['idSeccion']."'>" . $seccion['nombre'] . "</option>";
        }
    }

    public function listarSecciones(){
        $data['secciones'] = $this->seccionModel->listarSecciones();
        echo $this->render->render("view/listarSeccionView.mustache",$data);
    }

    public function listarSeccion1(){
        $data['seccion'] = $this->seccionModel->listarSecciones();
        echo $this->render->render("view/crearArticuloView.mustache",$data);
    }

    public function llamarFormEditarSeccion(){
        $this->isEscritor();

        $idSeccionAEditar = $_GET['id'];
        $data['seccionAEditar'] = $this->seccionModel->getSeccionById($idSeccionAEditar);

        echo $this->render->render("view/editarSeccion.mustache",$data);
    }

    public function editarSeccion(){
        $this->isEscritor();

        $idSeccionAEditar = $_GET['id'];
        $nombreNuevo =  $_POST['nombre-seccion'];

        $this->seccionModel->editarSeccion($idSeccionAEditar,$nombreNuevo);
        $this->listarSecciones();
    }

    private function isEscritor(){
        //si no tiene rol
        //o el rol NO es ESCRITOR
        //sacalo del sitio
        if( ! isset( $_SESSION['rol'] ) ||
            $_SESSION['rol']['nombre'] != 'ESCRITOR'){
            $this->render->redirect("/");
        }
    }

}