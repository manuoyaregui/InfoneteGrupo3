<?php

class InicioController
{
    private $render;
    private $productoModel;
    private $weather;

    public function __construct($productoModel,$render,$weather){
        $this->render = $render;
        $this->productoModel = $productoModel;
        $this->weather = $weather;
    }

    public function execute(){
        $data['weatherData']=$this->getWeatherData();
        $data["producto"] = $this->productoModel->getProductosDisponibles();
        //$data["temperatura"] = $this->weather->getTempFromLocation("Buenos Aires");
        echo $this->render->render("view/catalogoView.mustache",$data);
    }

    public function listarDiarios(){
        $data["producto"] = $this->productoModel->listarProductosDiarioDisponibles();
        echo $this->render->render("view/catalogoView.mustache",$data);
    }

    public function listarRevistas(){
        $data["producto"] = $this->productoModel->listarProductosRevistaDisponibles();
        echo $this->render->render("view/catalogoView.mustache",$data);
    }

    private function getWeatherData(){
        $array = array();
        if(isset($_SESSION['weatherObj'])){
            $array["temp"] = $this->weather->getTemp();
            $array['location'] = $this->weather->getLocation();
            $array['clima'] = $this->weather->getClima();
        }
        return $array;
    }

}