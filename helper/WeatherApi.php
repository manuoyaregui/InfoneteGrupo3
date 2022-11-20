<?php

class WeatherApi
{
    private $api;

    public function __construct($apiHandler)
    {
        $this->api = $apiHandler;
    }

    public function getTempFromLocation($location){
        $data_obtained = $this->api->GetDataByLocation($location);
        $data_of_the_day = (array)$data_obtained['days'][0];

        return $data_of_the_day['temp'];
    }

    public function getTempFromCoordinates($latitud,$longitud){
        $data_obtained = $this->api->GetDataByLatLong($latitud,$longitud);
        $data_of_the_day = (array)$data_obtained['days'][0];

        return $data_of_the_day['temp'];
    }

}