<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'license' => $this->faker->regexify('[A-Z]{3}\-[0-9]{3}'),
            'brand' => $this->faker->randomElement(['Audi', 'BMW', 'Mazda', 'Ford', 'Opel', 'Volkswagen']),
            'type' => $this->faker->randomElement(['Sedan', 'Hatchback', 'SUV', 'Coupe']),
            'creationYear' => $this->faker->numberBetween(2010, 2021),
            'picture' => 'default.png'
        ];
    }
}
