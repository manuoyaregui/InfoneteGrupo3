# Documentation

---

## Inicialización
````
include_once ("WeatherAPIHandler.php");
$weatherApi = new WeatherAPIHandler();
````
---

## Atributos Piolas
#### $array_returned
````
Ejemplo: $array_returned['latitude]
````

- ['latitude']
- ['longitude']

- ['address']
- ['description'] breve descripcion del clima

### Obtener datos del dia actual

#### crear esta variable para obtener esos datos
````
$data_of_the_day = (array)$data_obtained['days'][0];

Ejemplo: 
    $data_of_the_day['temp']
````

##### [datos] => ejemplo de valor
- [datetime] => 2022-11-15
- [tempmax] => 31.9
- [tempmin] => 16.6
- [temp] => 24.3
- [feelslikemax] => 30.1
- [feelslikemin] => 16.6
- [feelslike] => 23.7
- [dew] => 10
- [humidity] => 43.9
- [precip] => 0
- [precipprob] => 0
- [visibility] => 11.8
- [snow] => 0
- [conditions] => Clear
- [description] => Clear conditions throughout the day.
- [icon] => clear-day