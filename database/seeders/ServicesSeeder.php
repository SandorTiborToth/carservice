<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/data/services.json");
        $services = json_decode($json);

        foreach ($services as $service => $value) {
            Service::create([
                'id' => $value->id,
                'client_id' => $value->client_id,
                'car_id' => $value->car_id,
                'lognumber' => $value->lognumber,
                'event' => $value->event,
                'eventtime' => $value->eventtime,
                'document_id' => $value->document_id
            ]);
        }
    }
}
