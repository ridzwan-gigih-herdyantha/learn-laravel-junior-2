<?php

namespace Database\Seeders;

use App\Models\Taggable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;


class TaggableSeeder extends Seeder
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
                'tag_id' => $faker->numberBetween(1, 3),
                'taggable_id' => $faker->numberBetween(1, 5),
                'taggable_type' => 'App\Models\Video',
            ];
        }

        foreach (array_chunk($data, 5) as $item) {
            Taggable::insert($item);
        }
    }
}
