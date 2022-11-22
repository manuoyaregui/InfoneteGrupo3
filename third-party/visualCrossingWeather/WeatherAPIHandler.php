<?php

class WeatherAPIHandler
{
    private $API_KEY = "KZCVUBHDG7AC43VAYFHESZAAG";

    public function __construct()
    {    }

    public function GetDataByLatLong($latitud, $longitud){
        //Armo el url con la data
        $api_url= "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/{$latitud}%2C{$longitud}?unitGroup=metric&key={$this->API_KEY}&contentType=json";

        //hago fetch
        $json_data = file_get_contents($api_url);

        //paso a json
        $data_object =  json_decode($json_data);

        //retorno el json como array
        return (array)$data_object;

    }

    public function GetDataByLocation($location){
        //proceso el location string
        $location = str_replace(' ', '%20', $location);

        //NO ACEPTA ESPACIOS EN LOCATION
        $api_url =
            "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/{$location}?unitGroup=metric&key={$this->API_KEY}&contentType=json";

        //hago fetch
        $json_data = file_get_contents($api_url);

        //paso a json
        $data_object =  json_decode($json_data);

        //retorno el json como array
        return (array)$data_object;
    }
}


