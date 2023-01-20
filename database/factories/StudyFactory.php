<?php

namespace Database\Factories;

use App\Models\Study;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StudyFactory extends Factory
{
    protected $model = Study::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'title' => $this->faker->sentence(),
            'verse' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'published' => $this->faker->boolean(),
            'public' => $this->faker->boolean(),
            'created_at' => $this->faker->date(),
            'updated_at' => $this->faker->date(),
        ];
    }
}
