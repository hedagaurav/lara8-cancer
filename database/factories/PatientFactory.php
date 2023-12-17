<?php

namespace Database\Factories;

use App\Models\CancerTypes;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'full_name' => $this->faker->firstName() .' '. $this->faker->lastName(),
//            'password' => bcrypt('p@ssw0rd'),
            // 'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']),
            'contact_number' => $this->faker->regexify('[6-9]{1}[0-9]{9}'),
//            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'pincode' => $this->faker->regexify('[1-9]{1}[0-9]{5}'),
            'cancer_type' => $this->faker->randomElement(CancerTypes::all()),
            'documents' => '',
            'user_id'=> $this->faker->numberBetween(16,30),
        ];
    }
}
