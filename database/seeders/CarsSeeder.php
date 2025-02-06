<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

use App\Models\Car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/data/cars.json");
        $cars = json_decode($json);

        foreach ($cars as $car => $value) {
            Car::create([
                'id' => $value->id,
                'client_id' => $value->client_id,
                'car_id' => $value->car_id,
                'type' => $value->type,
                'registered' => $value->registered,
                'ownbrand' => $value->ownbrand,
                'accident' => $value->accident
            ]);
        }
    }
}
