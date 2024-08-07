<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\WeatherController;

// Route::get('/weather', [WeatherController::class, 'getWeather']);
Route::get('/weather', [App\Http\Controllers\WeatherController::class, 'getweather']);

