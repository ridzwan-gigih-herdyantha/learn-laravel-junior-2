<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        // User::factory(10)->create()  ;
        Post::factory(5)->create();
        // Post::create([
        //     'title' => 'Ini adalah title 1' , 
        //     'excerpt' => 'Ini adalah excerpt',
        //     'slug' => 'ini-slug',
        //     'body' => 'iniadalahbodyiniadalahbodyiniadalahbodyiniadalahbodyiniadalahbodyiniadalahbodyiniadalahbody'
        // ]);
        // Post::create([
        //     'title' => 'Ini adalah title 2' , 
        //     'excerpt' => 'Ini adalah excerpt 2',
        //     'slug' => 'ini-slug',
        //     'body' => 'iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2iniadalahbody2'
        // ]);

    }
}