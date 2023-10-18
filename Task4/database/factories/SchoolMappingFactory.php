<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\schoolMapping>
 */
class SchoolMappingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'member_id' =>fake()->numberBetween(1,9),
            'school_id' =>fake()->numberBetween(1,9),
        ];
    }
}
