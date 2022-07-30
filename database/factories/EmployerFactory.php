<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logo' => "{$this->faker->word}",
            'company' => "{$this->faker->word} company",
            'address' => $this->faker->address,
            'business_nature' => $this->faker->sentence,
        ];
    }
}
