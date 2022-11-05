<?php

class EscritorController
{
    private $render;
    private $productoModel;
    private $edicionModel;
    private $articuloModel;

    public function __construct($render ,$productoModel ,$edicionModel ,$articuloModel){
        $this->render = $render;
        $this->productoModel = $productoModel;
        $this->edicionModel = $edicionModel;
        $this->articuloModel = $articuloModel;
    }

    public function execute(){
        $rolUsuario = $_SESSION['rol']? $_SESSION['rol']['nombre'] : false;
        if($rolUsuario === 'ESCRITOR')
            echo $this->render->render("view/escritorView.mustache");
        else
            echo $this->render->redirect("/");
    }

    public function llamarFormCrearProducto(){
        echo $this->render->render("view/crearProductoView.mustache");
    }

    public function crearProducto(){

        if (isset($_POST["nombre"]) && isset($_POST["tipoProducto"]) && isset($_FILES["portada"]["name"])) {

            $nombre = $_POST["nombre"];
            $idTipo = $_POST["tipoProducto"];
            $portada = str_replace(" ", "-", $_FILES["portada"]["name"]);

            if (!empty($nombre) && !empty($idTipo)) {

                $nombreEnMayuscula = mb_strtoupper($nombre, 'utf-8');

                $resultado = $this->productoModel->crearProducto($nombreEnMayuscula, $idTipo, $portada);

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

    public function listarProductos() {
        $data["productos"] = $this->productoModel->listarProductos();

        echo $this->render->render("view/listarProductosView.mustache", $data);
    }

    public function editarProducto(){
        $id = $_GET["id"];

        if (isset($_POST["nombre"]) && isset($_POST["tipoProducto"]) && isset($_FILES["portada"]["name"])) {
            $nombre = $_POST["nombre"];
            $idTipo = $_POST["tipoProducto"];
            $portada = str_replace(" ", "-", $_FILES["portada"]["name"]);

            if (!empty($nombre) && !empty($idTipo)) {

                $nombreEnMayuscula = mb_strtoupper($nombre, 'utf-8');
                $resultado = $this->productoModel->editarProducto($id, $nombreEnMayuscula, $idTipo, $portada);

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
        if (isset($_POST["numeroEdicion"]) && isset($_POST["precioEdicion"]) && isset($_POST["idProducto"])) {

            $numeroEdicion = $_POST["numeroEdicion"];
            $precioEdicion = $_POST["precioEdicion"];
            $idProducto = $_POST["idProducto"];

            if (!empty($numeroEdicion) && !empty($precioEdicion) && !empty($idProducto)) {

                $resultado = $this->edicionModel->crearEdicion($numeroEdicion, $precioEdicion, $idProducto);

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
    }

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

        echo $this->render->render("view/crearArticuloView.mustache",$data);
    }

    public function listarArticulos() {
        //AGREGAR CODIGO EN EL MODEL ARTICULO PARA QUE FUNCIONE LISTAR
        $data["articulos"] = $this->articuloModel->listarArticulos();

        echo $this->render->render("view/listarArticulosView.mustache", $data);
    }

    public function crearArticulo(){
        //AGREGAR CODIGO
        $this->render->redirect("/escritor");
    }

    public function editarArticulo(){
        //AGREGAR CODIGO
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

}