<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    // Get weather
    public function getweather()
    {
        // Replace with your API key from WeatherAPI
        $apiKey = "c237556ff50f4435a81160501240508";

        // Replace with the city name you want to query
        $city = "London";

        // Set the number of days to query (e.g., 5 days)
        $days = 7;

        // Construct the API request URL
        $url = "http://api.weatherapi.com/v1/forecast.json?key=$apiKey&q=$city&days=$days&lang=en";

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        // Execute cURL request
        $response = curl_exec($ch);

        $datas = [];

        // Check if the request was successful
        if ($response === false) {
            echo "cURL Error: " . curl_error($ch);
        } else {
            // Parse and print the returned data
            $data = json_decode($response, true);

            $days_weather = $data['forecast']['forecastday'];
            foreach ($days_weather as $key => $day) {
                $datas[$key]['date'] = $day['date'];
                $datas[$key]['maxtemp_c'] = $day['day']['maxtemp_c'];
                $datas[$key]['mintemp_c'] = $day['day']['mintemp_c'];
                $datas[$key]['condition_text'] = $day['day']['condition']['text'];
                $datas[$key]['condition_icon'] = $day['day']['condition']['icon'];
            }
        }

        // Close cURL session
        curl_close($ch);

        return view('weather', ['weather_array' => $datas, 'city' => $city]);
    }
}
