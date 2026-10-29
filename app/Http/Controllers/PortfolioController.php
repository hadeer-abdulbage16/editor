<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        return view('portfolio.index', [
            'projects' => PortfolioProject::where('is_published', true)
                ->orderBy('sort_order')
                ->latest()
                ->get(),
            'name' => 'Mohamed Ahmed Abu El-Hagag',
            'email' => 'mohamedhagag5655555@gmail.com',
            'phone' => '01062050342',
        ]);
    }
}
