<?php

class OpenWeather
{
    private $api;

    public function __construct($apiHandler)
    {
        $this->api = $apiHandler;
    }

    public function saveDataInSession($latitud,$longitud){
        $data_obtained = $this->api->GetDataByLatLong($latitud,$longitud);
        $_SESSION['weatherObj'] = $data_obtained;
    }

    public function getTemp(){
        return $_SESSION['weatherObj']->main->temp;
    }

    public function getLocation(){
        return $_SESSION['weatherObj']->name;
    }

    public function getClima(){
        return $_SESSION['weatherObj']->weather[0]->main;
    }
}