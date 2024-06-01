<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Project;
use Code16\OzuClient\Eloquent\Media;
use Code16\OzuClient\Support\Database\OzuSeeder;

class DatabaseSeeder extends OzuSeeder
{
    public function run(): void
    {
        $this->clearMediaDirectory();

        Page::factory()
            ->has(Media::factory()->image('cover')->withFile(), 'cover')
            ->create([
                'title' => 'Homepage',
                'key' => 'home',
                'content' => "<p>The best</p><p>Monkey</p><p>in town</p>",
            ]);

        Page::factory()->create([
            'title' => 'Contact',
            'key' => 'contact',
            'content' => "<p>We look forward to the opportunity to work with you and embark on a journey to elevate your online presence. Let's create something extraordinary together!</p>",
        ]);

        Page::factory()
            ->has(Media::factory()->image('cover')->withFile(), 'cover')
            ->create([
                'title' => 'Meet the team',
                'key' => 'about',
                'content' => collect(range(2, 4))
                    ->map(fn ($paragraph) => '<p>'.fake()->paragraph(5).'</p>')
                    ->implode(''),
            ]);

        Project::factory()
            ->count(12)
            ->has(Media::factory()->image('cover')->withFile(), 'cover')
            ->has(Media::factory()->image('visuals')->withFile()->count(3), 'visuals')
            ->sequence(fn ($sequence) => [
                'order' => $sequence->index + 1,
                'year' => fake()->numberBetween(2000, date('Y')),
                'place' => fake()->city,
                'date' => fake()->date,
            ])
            ->create();
    }
}
