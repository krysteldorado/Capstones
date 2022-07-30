<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'abbreviation' => "{$this->faker->word} p",
            'program' => "{$this->faker->word} program",
        ];
    }
}
