<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarsOfClientController extends Controller
{
    public function getCarsOfClient(Request $request)
    {   
        $cars = Car::where('client_id', $_GET['client_id'])->get();
        
        return response()->json([
            'cars' => $cars
        ]);
    }
}
