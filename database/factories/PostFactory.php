<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $content=$this->faker->paragraph(5);
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'title' => ellipsis($content, 25),
            'content' => $content,
            'university_id' => $this->faker->numberBetween(1, 50),
            'type'=>'post',
            'bg_color' => '#000000',
            'text_color' => '#ffffff',
        ];
    }
}
