<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'category_id' => fake()->numberBetween(1, 2),
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'desc' => fake()->text(200),
            'img' => 'default.jpg',
            'views' => 0,
            'status' => fake()->numberBetween(0, 1),
            'publish_date' => fake()->dateTimeBetween('-1 week', '+1 week'),

        ];
    }
}
