<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesOfCarController extends Controller
{
    public function getServicesOfCar(Request $request)
    {   
        $services = Service::where('client_id', $_GET['client_id'])
                            ->where('car_id', $_GET['car_id'])
                            ->get();
        
        return response()->json([
            'services' => $services
        ]);
    }

}
