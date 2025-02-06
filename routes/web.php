<?php

use Illuminate\Support\Facades\Route;

use App\Models\Client;

Route::get('/', function () {
    return view('home', [
        'clients' => Client::all()
    ]);
});
