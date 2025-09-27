<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 64.0, 66.0),
            'calories' => $this->faker->numberBetween(1500, 3000),
            'exercise_time' => $this->faker->time(),
            'exercise_time' => sprintf('%02d:%02d:00', rand(0, 3), rand(0, 59)),
        ];
    }
}
