<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CollegeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'abbreviation' => "{$this->faker->word} c",
            'college' => "{$this->faker->word} college",
        ];
    }
}
