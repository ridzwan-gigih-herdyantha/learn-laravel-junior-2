<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Css'
        ]);
        Tag::create([
            'name' => 'Javascript'
        ]);
        Tag::create([
            'name' => 'Php'
        ]);
    }
}
