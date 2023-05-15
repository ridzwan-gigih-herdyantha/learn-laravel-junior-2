<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'Jakarta',
            'country_id' => '1'
        ]);
        City::create([
            'name' => 'Semarang',
            'country_id' => '1'
        ]);
        City::create([
            'name' => 'Kuala Lumpur',
            'country_id' => '2'
        ]);
        City::create([
            'name' => 'Shibuya',
            'country_id' => '3'
        ]);
        City::create([
            'name' => 'Osaka',
            'country_id' => '3'
        ]);
    }
}
