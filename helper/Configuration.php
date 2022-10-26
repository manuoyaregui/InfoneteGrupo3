<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");


include_once ("model/LoginModel.php");
include_once ("model/RegistrarseModel.php");
include_once("model/ProductoModel.php");
include_once("model/InicioModel.php");

include_once("controller/LoginController.php");
include_once ("controller/RegistrarseController.php");
include_once ("controller/InicioController.php");
include_once("controller/ProductoController.php");
include_once("controller/EscritorController.php");



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
        return new RegistrarseController($registrarseModel,$this->getRender());
    }
    public function getRegistrarseModel(){
        $database = $this->getDatabase();
        return new RegistrarseModel($database);
    }

    public function getInicioController(){
        $inicioModel = $this->getInicioModel();
        return new InicioController($inicioModel,$this->getRender());
    }

    public function getInicioModel(){
        $database = $this->getDatabase();
        return new InicioModel($database);
    }

    public function getProductoController() {
        $productoModel = $this->getProductoModel();
        return new ProductoController($this->getRender(), $productoModel);
    }
    public function getProductoModel() {
        return new ProductoModel($this->getDatabase());
    }

    public function getEscritorController(){

        return new EscritorController($this->getRender());
    }

    //------------------------------------------------------------------//

}