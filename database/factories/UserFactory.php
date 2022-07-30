<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = rand(0,1)? 'male': 'female';
        $rand_email_ext = rand(1000,2000);

        return [
            'firstname' => $this->faker->firstName($gender),
            'middlename' => $this->faker->lastname,
            'lastname' => $this->faker->lastname,
            'sex' => $gender,
            'civil_status' => 'single',
            'phone' => $this->faker->numerify('09#########'),
            'email' => preg_replace('/@example\..*/', "-{$rand_email_ext}@g.batstate-u.edu.ph", $this->faker->unique()->safeEmail()),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
