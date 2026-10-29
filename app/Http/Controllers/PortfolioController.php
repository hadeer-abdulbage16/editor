<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $projects = [
            ['number' => '01', 'category' => 'CINEMATIC EDIT', 'title' => 'The Visual Story', 'description' => 'A short demo concept focused on pacing, atmosphere, and visual rhythm.', 'duration' => '00:20', 'tone' => 'warm'],
            ['number' => '02', 'category' => 'SOCIAL CONTENT', 'title' => 'Made for the Feed', 'description' => 'A vertical short-form demo concept with quick cuts and clear visual hierarchy.', 'duration' => '00:15', 'tone' => 'violet'],
            ['number' => '03', 'category' => 'MOTION & TITLES', 'title' => 'Type in Motion', 'description' => 'A motion-graphics demo concept exploring animated typography and transitions.', 'duration' => '00:12', 'tone' => 'blue'],
        ];

        return view('portfolio.index', [
            'projects' => $projects,
            'name' => 'Mohamed Ahmed Abu El-Hagag',
            'email' => 'mohamedhagag5655555@gmail.com',
            'phone' => '01062050342',
        ]);
    }
}
