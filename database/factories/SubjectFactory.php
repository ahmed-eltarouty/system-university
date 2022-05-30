<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{

    protected $model = \App\Models\Subject::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'code' => Str::random(6),
            'study_hours' => $this->faker->numberBetween(1,3),
            'max_degree' => $this->faker->numberBetween(100,200),
            'min_degree' => $this->faker->numberBetween(50,100),
            'total_students_can_register' => $this->faker->numberBetween(100, 1000),
            'GPA_Greater_Than' => $this->faker->randomFloat(2, 0, 3),
        ];
    }
}
