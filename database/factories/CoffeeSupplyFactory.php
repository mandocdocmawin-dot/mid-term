<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoffeeSupply>
 */
class CoffeeSupplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'coffee_id' => 'COF-' . str_pad($this->faker->unique()->numberBetween(1, 10000), 4, '0', STR_PAD_LEFT),
            'name' => $this->faker->name(),
            'category' => $this->faker->randomElement(['Arabica', 'Robusta', 'Liberica']),
            'quantity' => $this->faker->numberBetween(1, 100),
            'unit_of_measure' => $this->faker->randomElement(['kg', 'lbs', 'oz']),
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
