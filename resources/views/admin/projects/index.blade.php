@extends('admin.layout')
@section('title', 'Projects')
@section('heading', 'Projects')
@section('content')
<div class="page-actions">
    <p class="muted">Manage every project shown on the public portfolio.</p>
    <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">+ Add project</a>
</div>

@if (session('status'))
    <div class="form-success" role="status">{{ session('status') }}</div>
@endif

@if ($projects->isEmpty())
    <section class="panel empty-state"><span>▤</span><h3>Your work starts here.</h3><p>Add your first project. Drafts remain hidden from the public portfolio.</p></section>
@else
    <div class="admin-project-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px">
        @foreach ($projects as $project)
            <article class="panel admin-project-card" style="overflow:hidden">
                @if ($project->thumbnail_path)
                    <img src="{{ asset($project->thumbnail_path) }}" alt="{{ $project->title }}" style="width:100%;height:180px;object-fit:cover;display:block">
                @else
                    <div style="height:180px;display:grid;place-items:center;background:#242424;color:#aaa">No thumbnail uploaded</div>
                @endif
                <div style="padding:18px">
                    <div style="display:flex;justify-content:space-between;gap:12px;align-items:center">
                        <span class="status-pill {{ $project->is_published ? 'published' : 'draft' }}">{{ $project->is_published ? 'Published' : 'Draft' }}</span>
                        <small>Order: {{ $project->sort_order }}</small>
                    </div>
                    <h3 style="margin:12px 0 4px">{{ $project->title }}</h3>
                    <p class="project-category">{{ $project->category }}</p>
                    @if ($project->description)<p>{{ $project->description }}</p>@endif
                    @if ($project->duration)<p><strong>Duration:</strong> {{ $project->duration }}</p>@endif
                    @if ($project->video_url)
                        <p><strong>Video:</strong> <a class="inline-link" href="{{ $project->video_url }}" target="_blank" rel="noopener noreferrer">Open video link ↗</a></p>
                    @else
                        <p class="muted">No video link added.</p>
                    @endif
                    <div class="actions" style="display:flex;gap:14px;align-items:center;margin-top:16px">
                        <a class="inline-link" href="{{ route('admin.projects.edit', $project) }}">Edit project</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Delete this project?')">
                            @csrf @method('DELETE')
                            <button class="danger-link" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    <div class="pagination">{{ $projects->links() }}</div>
@endif
@endsection
