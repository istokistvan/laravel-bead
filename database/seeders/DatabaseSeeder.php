<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            VehicleSeeder::class,
            IncidentSeeder::class,
            UserSeeder::class,
            HistorySeeder::class,
        ]);

        $vehicles = \App\Models\Vehicle::all();

        foreach ($vehicles as $vehicle) {
            $vehicle->damageEvents()->sync(\App\Models\Incident::all()->random());
        }
    }
}
