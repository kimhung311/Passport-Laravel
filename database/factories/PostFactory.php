<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::random(10),
            'content' => Str::random(10),
            'description' =>Str::random(10),
            'image' => Str::random(10),
            'image_detail'  => Str::random(10),
            'total_view' => rand(1, 100),
            'hot' => rand(0, 1),
            'category_id' => rand(2,5),
            // 'author_id' => rand(4, 10),
            'user_id' => rand(4,5),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return [];
    }
}