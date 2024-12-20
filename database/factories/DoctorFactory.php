<?php

namespace Database\Factories;

use App\Models\CancerTypes;
use App\Models\Doctor;
use App\Models\User;
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
//            'fullname'=> $this->faker->firstName() . ' ' . $this->faker->lastName(),
//            'email'=> $this->faker->unique()->safeEmail(),
//            'password'=> bcrypt('p@ssw0rd'),
//            'user_id'=> $this->faker->randomElement($doc),
            'user_id'=> User::factory()->create(['user_type' => 'D']),
            
            'specialization'=> $this->faker->randomElement(CancerTypes::all()),
//            'username'=> $this->faker->userName(),
        ];
    }
}
