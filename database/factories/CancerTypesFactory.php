<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CancerTypesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cancer_name'=> $this->faker->word(),
            // 'description'=> $this->faker->paragraph(),
        ];
    }
}
