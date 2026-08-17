<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(50),
            'content' => fake()->paragraph(),
            'user_id' => User::all()->random()->id ?? User::factory(),
            'category_id' => Category::all()->random()->id ?? Category::factory()
        ];
    }
}
