<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'current_stock' => $this->faker->numberBetween(1, 200),
            'minimum_stock' => $this->faker->numberBetween(0, 200),
            'monthly_consumption' => $this->faker->numberBetween(0, 200)
        ];
    }
}
