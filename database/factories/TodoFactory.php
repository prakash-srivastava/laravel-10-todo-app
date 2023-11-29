<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isCompleteStat = collect([1, 0]);

        return [
            'task_name' => fake()->name(),
            'description' => fake()->paragraph(),
            'is_complete' => $isCompleteStat->random(),
        ];
    }
}
