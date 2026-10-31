<?php

namespace App\\Http\\Controllers\\Admin;

use App\\Http\\Controllers\\Controller;
use App\\Models\\PortfolioProject;
use Illuminate\\Http\\RedirectResponse;
use Illuminate\\Http\\Request;
use Illuminate\\Support\\Facades\\File;
use Illuminate\\Support\\Str;
use Illuminate\\View\\View;

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
        $data = $this->validated($request);
        $data['thumbnail_path'] = $this->uploadThumbnail($request);

        PortfolioProject::create($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project created successfully.');
    }

    public function edit(PortfolioProject $project): View
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, PortfolioProject $project): RedirectResponse
    {
        $data = $this->validated($request);
        $newThumbnail = $this->uploadThumbnail($request);

        if ($newThumbnail) {
            $this->deleteThumbnail($project->thumbnail_path);
            $data['thumbnail_path'] = $newThumbnail;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project updated successfully.');
    }

    public function destroy(PortfolioProject $project): RedirectResponse
    {
        $this->deleteThumbnail($project->thumbnail_path);
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
            'thumbnail_url' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'duration' => ['nullable', 'string', 'max:20'],
            'tone' => ['required', 'in:warm,violet,blue'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:100000'],
            'is_published' => ['sometimes', 'boolean'],
        ], [
            'thumbnail_url.image' => 'Please choose a valid image file.',
            'thumbnail_url.mimes' => 'The thumbnail must be JPG, PNG, or WEBP.',
            'thumbnail_url.max' => 'The thumbnail image must be 3 MB or smaller.',
            'video_url.url' => 'Enter a full public video URL starting with https://, or leave this field empty.',
            
        ]) + ['is_published' => $request->boolean('is_published')];
    }

    private function uploadThumbnail(Request $request): ?string
    {
        if (!$request->hasFile('thumbnail_url')) {
            return null;
        }

        $directory = public_path('uploads/projects');
        File::ensureDirectoryExists($directory);

        $file = $request->file('thumbnail_url');
        $filename = Str::uuid()->toString() . '.' . $file->extension();
        $file->move($directory, $filename);

        return 'uploads/projects/' . $filename;
    }

    private function deleteThumbnail(?string $path): void
    {
        if (!$path || !str_starts_with($path, 'uploads/projects/')) {
            return;
        }

        $fullPath = public_path($path);
        if (is_file($fullPath)) {
            @unlink($fullPath);
        }
    }
}
