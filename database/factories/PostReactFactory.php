<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostReactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $reacts = [
            'like',
            'heart',
            'haha',
            'sad',
        ];

        return [
            'react' => $reacts[rand(0,3)],
        ];
    }
}
