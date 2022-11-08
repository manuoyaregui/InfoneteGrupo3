<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");
include_once("helper/Mailer.php");


include_once ("model/LoginModel.php");
include_once ("model/RegistrarseModel.php");
include_once("model/ProductoModel.php");
include_once("model/EdicionModel.php");
include_once ("model/ArticuloModel.php");
include_once ("model/SeccionModel.php");


include_once("controller/LoginController.php");
include_once ("controller/RegistrarseController.php");
include_once ("controller/InicioController.php");
include_once("controller/ProductoController.php");
include_once("controller/EscritorController.php");
include_once("controller/EditorController.php");
include_once ("controller/AdministradorController.php");



include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("Router.php");

class Configuration{


    private function getDatabase(){
        $config = $this->getConfig();
        return new MysqlDatabase(
            $config["servername"],
            $config["username"],
            $config["password"],
            $config["dbname"]
        );
    }

    private function getConfig(){
        return parse_ini_file("config/config.ini");
    }

    public function getRouter(){
        return new Router($this);
    }

    public function getUrlHelper(){
        return new UrlHelper();
    }

    public function getRender(){
        return new Render('view/partial');
    }
    //------------------------------------------------------------------//
    public function getLoginController(){
        $loginModel = $this->getLoginModel();
        return new login($loginModel,$this->getRender());
    }
    public function getLoginModel(){
        $database = $this->getDatabase();
        return new LoginModel($database);
    }

    public function getRegistrarseController(){
        $registrarseModel = $this->getRegistrarseModel();
        $mailer = $this->getMailer();
        return new RegistrarseController($registrarseModel, $this->getRender(), $this->getMailer());
    }
    public function getRegistrarseModel(){
        $database = $this->getDatabase();
        return new RegistrarseModel($database);
    }

    public function getInicioController(){
        $productoModel = $this->getproductoModel();
        return new InicioController($productoModel,$this->getRender());
    }


    public function getProductoController() {
        $productoModel = $this->getProductoModel();
        return new ProductoController($this->getRender(), $productoModel);
    }

    public function getProductoModel() {
        return new ProductoModel($this->getDatabase());
    }

    public function getEdicionModel() {
        return new EdicionModel($this->getDatabase());
    }

    public function getArticuloModel() {
        return new ArticuloModel($this->getDatabase());
    }

    public function getSeccionModel(){
        return new SeccionModel($this->getDatabase());
    }

    public function getEscritorController(){
        $productoModel = $this->getProductoModel();
        $edicionModel = $this->getEdicionModel();
        $articuloModel = $this->getArticuloModel();
        $seccionModel = $this->getSeccionModel();
        return new EscritorController($this->getRender(), $productoModel, $edicionModel, $articuloModel,$seccionModel);
    }

    public function getAdministradorController(){
        $productoModel = $this->getProductoModel();
        $edicionModel = $this->getEdicionModel();
        $articuloModel = $this->getArticuloModel();
        return new AdministradorController($this->getRender(), $productoModel, $edicionModel, $articuloModel);
    }

    public function getEditorController(){
        $productoModel = $this->getProductoModel();
        $edicionModel = $this->getEdicionModel();
        $articuloModel = $this->getArticuloModel();
        return new EditorController($this->getRender(), $productoModel, $edicionModel, $articuloModel);
    }




    //------------------------------------------------------------------//
    public function getMailer() {
        return new Mailer();
    }

}