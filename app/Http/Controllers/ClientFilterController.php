<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Car;
use App\Models\Service;


class ClientFilterController extends Controller
{
    /*public function filterByClientName()
    {
        $client = Client::where('name', 'like', "%{$_GET['client_name_pattern']}%")->get();
        
        return response()->json([
            'client' => $client,
            'count_of_clients' => sizeof($client)
        ]);

    }*/



    public function filterByClientName()
    {        
        // A "Luke" nevet tartalmazó kliensek lekérdezése
        $clients = Client::select('id', 'name', 'idcard')
            ->where('name', 'LIKE', "%{$_GET['client_name_pattern']}%")
            ->get();

        if (sizeof($clients) == 1) {

            $client = Client::select('id', 'name', 'idcard')
                ->where('name', 'LIKE', "%{$_GET['client_name_pattern']}%")
                ->first();

            // Eredmények tárolása
            $result = [];

            //foreach ($clients as $client) {
            // Autók számának lekérdezése a client_id alapján
            $cars_number = Car::where('client_id', $client->id)
                ->count();

            // Logok számának lekérdezése a client_id alapján
            $logs_number = Service::where('client_id', $client->id)
                ->count();

            $client = [
                'id' => $client->id,
                'name' => $client->name,
                'idcard' => $client->idcard,
                'cars_number' => $cars_number,
                'logs_number' => $logs_number,
            ];

            return response()->json([
                'client' => $client,
                'count_of_clients' => 1
            ]);

                // Az összegzett eredmények hozzáadása
            //}

            // A $result tartalmazza a kívánt adatokat, amelyeket szükség szerint felhasználhatsz
        }

        return response()->json([
            'count_of_clients' => sizeof($clients)
        ]);


    }


















    public function filterByClientIdcard()
    {
        $client = Client::where('idcard', $_GET['client_idcard_pattern'])->first();
        
        return response()->json([
            'client' => $client
        ]);
    }
}
