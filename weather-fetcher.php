<?php
// weather-fetcher.php
// Fetch current weather for a city using OpenWeatherMap API

$apiKey = "YOUR_API_KEY"; // get free API key from https://openweathermap.org/api
$city = "Berlin";
$apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&units=metric&appid=$apiKey";

// fetch data
$response = file_get_contents($apiUrl);
if ($response === FALSE) {
    die("Error fetching weather data.");
}

$data = json_decode($response, true);
$temp = $data['main']['temp'];
$desc = $data['weather'][0]['description'];
$humidity = $data['main']['humidity'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather Fetcher</title>
</head>
<body>
    <h2>Current Weather in <?php echo $city; ?></h2>
    <table border="1" cellpadding="5">
        <tr><th>Temperature (°C)</th><td><?php echo $temp; ?></td></tr>
        <tr><th>Description</th><td><?php echo ucfirst($desc); ?></td></tr>
        <tr><th>Humidity (%)</th><td><?php echo $humidity; ?></td></tr>
    </table>
</body>
</html>

