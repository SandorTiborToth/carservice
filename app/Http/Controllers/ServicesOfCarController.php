<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesOfCarController extends Controller
{
    public function getServicesOfCar(Request $request)
    {   
        $client_id = $_GET['client_id'];
        $car_id = $_GET['car_id'];

        $services = Service::join('cars', function ($join) {
                $join->on('services.client_id', '=', 'cars.client_id')
                     ->on('services.car_id', '=', 'cars.car_id');
            })
            ->where('services.client_id', $client_id)
            ->where('services.car_id', $car_id)
            ->get(['services.lognumber', 'services.event', 'services.eventtime', 'services.document_id', 'cars.registered']);
        
        return response()->json([
            'services' => $services
        ]);
    }

}
