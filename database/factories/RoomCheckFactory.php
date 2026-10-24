<?php

namespace Database\Factories;

use App\Models\RoomCheck;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RoomCheck>
 */
class RoomCheckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_id' => fake()->numberBetween(1, 20),
            'student_id' => fake()->numberBetween(1000, 9999),
            'student_name' => fake()->name(),
        ];
    }
}
