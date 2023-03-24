<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        // Post::factory(5)->create();
        // Post::create([
        //     'title' => 'Ini adalah title 1' , 
        //     'excerpt' => 'Ini adalah excerpt',
        //     'body' => 'iniadalahbodyiniadalahbodyiniadalahbodyiniadalahbodyiniadalahbodyiniadalahbodyiniadalahbody'
        // ]);
        // Post::create([
        //     'title' => 'Ini adalah title 2' , 
        //     'excerpt' => 'Ini adalah excerpt 2',
        //     'body' => 'iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2'
        // ]);
    }
}