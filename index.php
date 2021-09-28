<?php

require_once 'vendor/autoload.php';
use App\DayWeather;
use App\TodayHourly;
use Carbon\Carbon;

$currentTime = Carbon::now("Europe/Tallinn")->toDateTimeString();
$currentHour =(int) substr($currentTime,11,2);


$url = "http://api.weatherapi.com/v1/forecast.json?key=c3a117ac1aee4417b4680023212809&q=Riga&days=7&aqi=no&alerts=no";

if (isset($_GET['city']))
{
    $url = str_replace('Riga',$_GET['city'],$url);
}

$json = file_get_contents($url);
$weatherData = json_decode($json, true);

$todayHourly = new TodayHourly(
    $weatherData['forecast']['forecastday'][0]['hour'],
    $currentHour
);

$hour0 = $todayHourly->getCurrentHourData();
$hour1 = $todayHourly->getNextHourData();
$hour2 = $todayHourly->get2HoursData();
$hour3 = $todayHourly->get3HoursData();
$hour4 = $todayHourly->get4HoursData();

$day1 = new DayWeather(
    $weatherData['forecast']['forecastday'][0]['date'],
    $weatherData['forecast']['forecastday'][0]['day']['maxtemp_c'],
    $weatherData['forecast']['forecastday'][0]['day']['mintemp_c'],
    $weatherData['forecast']['forecastday'][0]['day']['maxwind_kph'],
    $weatherData['forecast']['forecastday'][0]['day']['condition']['icon']
);

$day2 = new DayWeather(
    $weatherData['forecast']['forecastday'][1]['date'],
    $weatherData['forecast']['forecastday'][1]['day']['maxtemp_c'],
    $weatherData['forecast']['forecastday'][1]['day']['mintemp_c'],
    $weatherData['forecast']['forecastday'][1]['day']['maxwind_kph'],
    $weatherData['forecast']['forecastday'][1]['day']['condition']['icon']
);

$day3 = new DayWeather(
    $weatherData['forecast']['forecastday'][2]['date'],
    $weatherData['forecast']['forecastday'][2]['day']['maxtemp_c'],
    $weatherData['forecast']['forecastday'][2]['day']['mintemp_c'],
    $weatherData['forecast']['forecastday'][2]['day']['maxwind_kph'],
    $weatherData['forecast']['forecastday'][2]['day']['condition']['icon']
);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
          crossorigin="anonymous">


    <title>Weather</title>
</head>
<body>
    <div class="row">
        <div class="col">
            <p class="text-primary fs-4"><?php echo $day1->getDate() ?></p>
            <img src="<?php echo $day1->getIconUrl() ?>">
            <p class="text-primary fs-4">Max Temp <?php echo $day1->getMaxTemp() ?>°C</p>
            <p class="text-primary fs-4">Min Temp <?php echo $day2->getMinTemp() ?>°C</p>
            <p class="text-primary fs-4">Wind Speed <?php echo $day2->getMaxWind() ?>/kph</p>
        </div>

        <div class="col">
            <p class="text-primary fs-4"><?php echo $day2->getDate() ?></p>
            <img src="<?php echo $day2->getIconUrl() ?>">
            <p class="text-primary fs-4">Max Temp <?php echo $day2->getMaxTemp() ?>°C</p>
            <p class="text-primary fs-4">Min Temp <?php echo $day2->getMinTemp() ?>°C</p>
            <p class="text-primary fs-4">Wind Speed <?php echo $day2->getMaxWind() ?>/kph</p>
        </div>

        <div class="col">
            <p class="text-primary fs-4"><?php echo $day3->getDate() ?></p>
            <img src="<?php echo $day3->getIconUrl() ?>">
            <p class="text-primary fs-4">Max Temp <?php echo $day3->getMaxTemp() ?>°C</p>
            <p class="text-primary fs-4">Min Temp <?php echo $day2->getMinTemp() ?>°C</p>
            <p class="text-primary fs-4">Wind Speed <?php echo $day2->getMaxWind() ?>/kph</p>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col">
            <p class="text-primary fs-4"><?php echo $todayHourly->getCurrentHour() ?>:00</p>
            <img src="<?php echo $hour0[2] ?>">
            <p class="text-primary fs-4">Temp <?php echo $hour0[0] ?>°C</p>
            <p class="text-primary fs-4">Wind Speed <?php echo $hour0[1] ?>/kph</p>
        </div>

        <div class="col">
            <p class="text-primary fs-4"><?php echo $todayHourly->getCurrentHour()+1 ?>:00</p>
            <img src="<?php echo $hour1[2] ?>">
            <p class="text-primary fs-4">Temp <?php echo $hour1[0] ?>°C</p>
            <p class="text-primary fs-4">Wind Speed <?php echo $hour1[1] ?>/kph</p>
        </div>

        <div class="col">
            <p class="text-primary fs-4"><?php echo $todayHourly->getCurrentHour()+2 ?>:00</p>
            <img src="<?php echo $hour2[2] ?>">
            <p class="text-primary fs-4">Temp <?php echo $hour2[0] ?>°C</p>
            <p class="text-primary fs-4">Wind Speed <?php echo $hour2[1] ?>/kph</p>
        </div>

        <div class="col">
            <p class="text-primary fs-4"><?php echo $todayHourly->getCurrentHour()+3 ?>:00</p>
            <img src="<?php echo $hour3[2] ?>">
            <p class="text-primary fs-4">Temp <?php echo $hour3[0] ?>°C</p>
            <p class="text-primary fs-4">Wind Speed <?php echo $hour3[1] ?>/kph</p>
        </div>

        <div class="col">
            <p class="text-primary fs-4"><?php echo $todayHourly->getCurrentHour()+4 ?>:00</p>
            <img src="<?php echo $hour4[2] ?>">
            <p class="text-primary fs-4">Temp <?php echo $hour4[0] ?>°C</p>
            <p class="text-primary fs-4">Wind Speed <?php echo $hour4[1] ?>/kph</p>
        </div>
    </div>

    <form method="get">
        <div class="mb-3 w-50">
            <label for="exampleInputEmail1" class="form-label">Enter a city</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="city">
        </div>

        <button type="submit" class="btn btn-primary">Show weather</button>
    </form>
</body>
</html>
