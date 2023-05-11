<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0;$i < 5; $i++ )
        {
            $data[] = [
                'title' => $faker->sentence(),
                'url' => $faker->url(),
            ];
        }

        foreach (array_chunk($data, 5) as $item) {
            Video::insert($item);
        }
    }
}
