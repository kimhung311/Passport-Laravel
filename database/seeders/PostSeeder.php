<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');
        for ($i = 0; $i <= 10; $i++) {

            DB::table('posts')->insert([
                'title' => Str::random(10),
                'content' => Str::random(100),
                'description' => Str::random(100),
                'image' => Str::random(10),
                'image_detail' => Str::random(10),
                'total_view' => rand(0, 100),
                'hot' => rand(0, 1),
                'category_id' => rand(4,10),
                'author_id' => 4,
                'user_id' => 3,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}