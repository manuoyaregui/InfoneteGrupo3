<?php

class openWeatherApiHandler
{
    private $API_key = "83cbb94fb6d6fe5f6eb265ca1b59e3c3";

    public function __construct()
    {
    }

    public function GetDataByLatLong($lat, $lon){

        $api_url= "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&units=metric&appid={$this->API_key}";
        $json_data = file_get_contents($api_url);

        return json_decode($json_data);

    }
}


//$lat = -34.653141;
//$lon = -58.475545;
//
//$apiURL2 = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$API_key}";
//
//$result = file_get_contents($apiURL2);
//$json_data = json_decode($result);
//echo "<pre>";
//print_r($json_data->coord->lat);
//echo "</pre>";
