<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

   public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => collect(range(3, 7))
                ->map(fn ($paragraph) => '<p>'.fake()->paragraph(5).'</p>')
                ->implode(''),
//                'reference' => fake()->numerify('##-###'),
//                'year' => fake()->numberBetween(2000, 2024)
        ];
    }
}
