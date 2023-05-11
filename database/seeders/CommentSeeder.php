<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Factory::create();
        // for ($i=0;$i < 5; $i++ )
        // {
        //     $data = [
        //         'comment_body' => $faker->text(),
        //         'commentable_id' => $faker->numberBetween(2),
        //         'commentable_type' => 'App\Models\Video',
        //     ];
        // }

        // // for ($i=0;$i < 5; $i++ )
        // // {
        // //     $data = [
        // //         'comment_body' => $faker->text(),
        // //         'commentable_id' => $faker->numberBetween(1, 5),
        // //         'commentable_type' => 'App\Models\Post',
        // //     ];
        // // }

        // // $data = array_merge($data1, $data2);


        // foreach (array_chunk($data, 5) as $item) {
        //     Comment::insert($item);
        // }
        $faker = Factory::create();
        for ($i=0;$i < 5; $i++ )
        {
            $data[] = [
                'comment_body' => $faker->text(),
                'commentable_id' => $faker->numberBetween(1, 5),
                'commentable_type' => 'App\Models\Video',
            ];
        }

        foreach (array_chunk($data, 5) as $item) {
            Comment::insert($item);
        }
    }
}
