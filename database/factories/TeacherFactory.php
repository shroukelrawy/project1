<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {  
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'no_of_experience' => $this->faker->numberBetween(0, 15),
            'job_title' => $this->faker->randomElement(['English Teacher', 'Math Teacher', 'Science Teacher', 'Computer Teacher']),
        ];
    }
}
