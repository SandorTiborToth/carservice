<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientFilterController extends Controller
{
    public function filterByClientName()
    {
        $client = Client::where('name', 'like', "%{$_GET['client_name_pattern']}%")->first();
        
        return response()->json([
            'client' => $client
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
