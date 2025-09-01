<?php

/**
 * When making factories, do not forget to include the model file in your factory code.
 *
 * You should always have use App\Models\--insert model name here-- in your Factory file.
 */

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            //Code added upon addition of foreign key column
            'employer_id' => Employer::factory(),
            'salary' => 'PHP50,000'
        ];
    }
}
