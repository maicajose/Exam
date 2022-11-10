<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tasks>
 */
class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'taskName' => fake()->sentence(),
            'details' => fake()->realText($maxNbChars = 50),
            'created' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'category' => fake()->word(),
            'owner' => fake()->firstName()
        ];
    }
}
