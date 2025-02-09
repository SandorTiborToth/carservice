<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Service;

class CarsOfClientController extends Controller
{
    public function getCarsOfClient(Request $request)
    {   
        $client_id = $_GET['client_id'];

        $cars = Car::join('services', function ($join) {
                $join->on('cars.client_id', '=', 'services.client_id')
                     ->on('cars.car_id', '=', 'services.car_id');
            })
            ->where('cars.client_id', $client_id)
            ->where('services.lognumber', function ($query) use ($client_id) {
                $query->selectRaw('MAX(services.lognumber)')
                      ->from('services')
                      ->where('services.client_id', $client_id)
                      ->groupBy('services.client_id', 'services.car_id');
            })
            ->get(['cars.client_id', 'cars.car_id', 'cars.type', 'cars.registered', 'cars.ownbrand', 'cars.accident', 'services.event', 'services.eventtime']);

        return response()->json([
            'cars' => $cars
        ]);
    }

}
