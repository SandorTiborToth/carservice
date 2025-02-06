<?php

use Illuminate\Support\Facades\Route;

use App\Models\Client;
use App\Models\Car;
use App\Http\Controllers\CarsOfClientController;
use App\Http\Controllers\ServicesOfCarController;

Route::get('/', function () {
    return view('home', [
        'clients' => Client::all()
    ]);
});

Route::get('/get-cars-of-client', [CarsOfClientController::class, 'getCarsOfClient']);

Route::get('/get-services-of-car', [ServicesOfCarController::class, 'getServicesOfCar']);
