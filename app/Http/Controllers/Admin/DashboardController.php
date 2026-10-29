<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'totalProjects' => PortfolioProject::count(),
            'publishedProjects' => PortfolioProject::where('is_published', true)->count(),
            'draftProjects' => PortfolioProject::where('is_published', false)->count(),
            'recentProjects' => PortfolioProject::latest()->take(5)->get(),
        ]);
    }
}
