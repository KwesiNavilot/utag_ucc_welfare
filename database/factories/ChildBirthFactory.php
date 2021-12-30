<?php

namespace Database\Factories;

use App\Models\BenefitRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildBirthFactory extends Factory
{
    protected $model = BenefitRequest::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'request_id' => "BRI" . Carbon::now()->format('YmdH') . $this->faker->randomNumber(4, true),
            'staff_id' => $this->faker->randomElement(['33350499', '45958430', '51251943', '52477652', '60696090']),
            'child_name' => $this->faker->name(),
            'child_dob' => $this->faker->date('Y-m-d'),
            'media' => 'childbirths/WNyKCc5fZoP2ppQa2E21aVzYALcuGVIPd6RrbJpw.jpg'
        ];
    }
}
