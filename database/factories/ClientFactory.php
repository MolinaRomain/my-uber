<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Panier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'address' => $this->faker->address(),
            'phone' => '+33' . $this->faker->randomNumber($nbDigits = 9, $strict = false),
        ];
    }
}
