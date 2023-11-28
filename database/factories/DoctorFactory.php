<?php

namespace Database\Factories;

use App\Models\CancerTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname'=> $this->faker->firstName() . ' ' . $this->faker->lastName(), 
            'email'=> $this->faker->unique()->safeEmail(),
            'password'=> bcrypt('p@ssw0rd'),
            'specialization'=> CancerTypes::factory(),
            'username'=> $this->faker->userName(),
        ];
    }
}
