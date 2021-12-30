<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
        return [
            'staff_id' => $this->faker->randomNumber(8, true),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => 'member' . $this->faker->randomNumber(4) . "@ucc.edu.gh",
            'phonenumber' => $this->faker->randomElement(['0541234567', '0551234567', '0201234567', '0501234567', '0271234567']),
            'department' => $this->faker->randomElement(['cesed', 'ccdrr', 'dcsit', 'classics', 'french', 'cegrad', 'mathematics', 'physics', 'chemistry', 'economics']),
            'date_joined' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'password' => Hash::make('1122334455')
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
