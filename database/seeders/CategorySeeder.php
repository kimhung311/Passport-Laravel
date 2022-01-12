<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
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
            DB::table('categories')->insert([
                'category_name' => Str::random(10),
                'parent_id' => rand(5, 15),
                'user_id' => rand(4, 10),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}