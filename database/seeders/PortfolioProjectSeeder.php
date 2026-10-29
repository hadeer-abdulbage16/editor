<?php

namespace Database\Seeders;

use App\Models\PortfolioProject;
use Illuminate\Database\Seeder;

class PortfolioProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            ['title' => 'The Visual Story', 'category' => 'CINEMATIC EDIT', 'description' => 'A short demo concept focused on pacing, atmosphere, and visual rhythm.', 'duration' => '00:20', 'tone' => 'warm', 'sort_order' => 1],
            ['title' => 'Made for the Feed', 'category' => 'SOCIAL CONTENT', 'description' => 'A vertical short-form demo concept with quick cuts and clear visual hierarchy.', 'duration' => '00:15', 'tone' => 'violet', 'sort_order' => 2],
            ['title' => 'Type in Motion', 'category' => 'MOTION & TITLES', 'description' => 'A motion-graphics demo concept exploring animated typography and transitions.', 'duration' => '00:12', 'tone' => 'blue', 'sort_order' => 3],
        ];

        foreach ($projects as $project) {
            PortfolioProject::firstOrCreate(
                ['title' => $project['title']],
                $project + ['is_published' => true]
            );
        }
    }
}
