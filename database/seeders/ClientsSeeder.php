<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

use App\Models\Clients;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/data/clients.json");
        $clients = json_decode($json);

        foreach ($clients as $client => $value) {
            Clients::create([
                'id' => $value->id,
                'name' => $value->name,
                'idcard' => $value->idcard
            ]);
        }
    }
}
