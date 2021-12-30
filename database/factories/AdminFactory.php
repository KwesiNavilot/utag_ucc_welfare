<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'admin_id' => $this->faker->randomNumber(8, false),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => 'executive' . $this->faker->randomNumber(2) . "@ucc.edu.gh",
            'position' => $this->faker->randomElement(['president', 'secretary', 'treasurer', 'organizer']),
            'phonenumber' => $this->faker->randomElement(['0541234567', '0551234567', '0201234567', '0501234567', '0271234567']),
            'role' => $this->faker->randomElement(['president', 'executive']),
            'password' => Hash::make('1122334455')
        ];
    }
}
