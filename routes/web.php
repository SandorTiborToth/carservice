<?php

use Illuminate\Support\Facades\Route;

use App\Models\Client;
use App\Models\Car;
use App\Http\Controllers\CarsOfClientController;
use App\Http\Controllers\ServicesOfCarController;
use App\Http\Controllers\ClientFilterController;


Route::get('/', function () {
    return view('home', [
        'clients' => Client::all()
    ]);
});

Route::get('/get-cars-of-client', [CarsOfClientController::class, 'getCarsOfClient']);

Route::get('/get-services-of-car', [ServicesOfCarController::class, 'getServicesOfCar']);

Route::get('/filter-by-client-name', [ClientFilterController::class, 'filterByClientName']);

Route::get('/filter-by-client-idcard', [ClientFilterController::class, 'filterByClientIdcard']);
