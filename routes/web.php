<?php

use Illuminate\Support\Facades\Route;

use App\Models\Client;
use App\Models\Car;
use App\Http\Controllers\CarsOfClientController;

Route::get('/', function () {
    return view('home', [
        'clients' => Client::all()
    ]);
});

Route::get('/get-cars-of-client', [CarsOfClientController::class, 'getCarsOfClient']);
