<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('admin.projects.index', ['projects' => PortfolioProject::orderBy('sort_order')->latest()->paginate(10)]);
    }

    public function create(): View
    {
        return view('admin.projects.form', ['project' => new PortfolioProject()]);
    }

    public function store(Request $request): RedirectResponse
    {
        PortfolioProject::create($this->validated($request));

        return redirect()->route('admin.projects.index')->with('status', 'Project created successfully.');
    }

    public function edit(PortfolioProject $project): View
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, PortfolioProject $project): RedirectResponse
    {
        $project->update($this->validated($request));

        return redirect()->route('admin.projects.index')->with('status', 'Project updated successfully.');
    }

    public function destroy(PortfolioProject $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('status', 'Project deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:2000'],
            'video_url' => ['nullable', 'url', 'max:2048'],
            'thumbnail_url' => ['nullable', 'url', 'max:2048'],
            'duration' => ['nullable', 'string', 'max:20'],
            'tone' => ['required', 'in:warm,violet,blue'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:100000'],
            'is_published' => ['nullable', 'boolean'],
        ]) + ['is_published' => $request->boolean('is_published')];
    }
}
