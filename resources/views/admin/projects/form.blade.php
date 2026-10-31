@extends('admin.layout')
@section('title', $project->exists ? 'Edit project' : 'Add project')
@section('heading', $project->exists ? 'Edit project' : 'Add a project')
@section('content')
<div class="form-wrap">
    <form class="panel project-form" method="POST" enctype="multipart/form-data" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}">
        @csrf
        @if ($project->exists) @method('PUT') @endif

        @if ($errors->any())
            <div class="form-errors" role="alert" aria-live="polite">
                <strong>Please fix the following fields:</strong>
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <div class="form-intro"><p class="eyebrow">PROJECT DETAILS</p><h2>{{ $project->exists ? 'Refine the details.' : 'Show the work.' }}</h2><p class="muted">Only published projects appear on the public portfolio.</p></div>

        <label>Project title
            <input name="title" value="{{ old('title', $project->title) }}" maxlength="255" required>
            @error('title') <small class="field-error">{{ $message }}</small> @enderror
        </label>
        <div class="form-two">
            <label>Category
                <input name="category" value="{{ old('category', $project->category ?: 'VIDEO EDITING') }}" maxlength="120" required>
                @error('category') <small class="field-error">{{ $message }}</small> @enderror
            </label>
            <label>Duration
                <input name="duration" value="{{ old('duration', $project->duration) }}" placeholder="00:30" maxlength="20">
                @error('duration') <small class="field-error">{{ $message }}</small> @enderror
            </label>
        </div>
        <label>Description
            <textarea name="description" rows="4" maxlength="2000">{{ old('description', $project->description) }}</textarea>
            @error('description') <small class="field-error">{{ $message }}</small> @enderror
        </label>
        <label>Project thumbnail (from your device)
            <input type="file" name="thumbnail_url" accept="image/jpeg,image/png,image/webp">
            <small>Select an image from your device. Allowed: JPG, PNG, WEBP. Maximum size: 3 MB. Leave empty to keep the current image.</small>
            @if ($project->thumbnail_path)
                <img src="{{ asset($project->thumbnail_path) }}" alt="Current project thumbnail" style="display:block;max-width:220px;max-height:140px;object-fit:cover;margin-top:10px;border-radius:8px">
            @endif
            @error('thumbnail_url') <small class="field-error">{{ $message }}</small> @enderror
        </label>
        <label>Video URL
            <input type="url" name="video_url" value="{{ old('video_url', $project->video_url) }}" placeholder="YouTube, Vimeo, or direct MP4 URL">
            <small>Use a public YouTube/Vimeo link or a direct .mp4 link. The video must allow embedding/public viewing.</small>
            @error('video_url') <small class="field-error">{{ $message }}</small> @enderror
        </label>
        <label>Thumbnail URL (optional fallback)
            <input type="url" name="thumbnail_url" value="{{ old('thumbnail_url', $project->thumbnail_url) }}" placeholder="https://…">
            <small>Optional; the uploaded image above takes priority.</small>
            @error('thumbnail_url') <small class="field-error">{{ $message }}</small> @enderror
        </label>
        <div class="form-two">
            <label>Visual style
                <select name="tone" required>
                    <option value="warm" @selected(old('tone', $project->tone ?: 'warm') === 'warm')>Warm</option>
                    <option value="violet" @selected(old('tone', $project->tone) === 'violet')>Violet</option>
                    <option value="blue" @selected(old('tone', $project->tone) === 'blue')>Blue</option>
                </select>
                @error('tone') <small class="field-error">{{ $message }}</small> @enderror
            </label>
            <label>Sort order
                <input type="number" name="sort_order" min="0" max="100000" value="{{ old('sort_order', $project->sort_order ?? 0) }}" required>
                @error('sort_order') <small class="field-error">{{ $message }}</small> @enderror
            </label>
        </div>
        <label class="check-row"><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $project->is_published))> Publish this project on the website</label>
        <div class="form-actions"><a class="btn btn-ghost" href="{{ route('admin.projects.index') }}">Cancel</a><button class="btn btn-primary" type="submit">{{ $project->exists ? 'Save changes' : 'Create project' }} <span>↗</span></button></div>
    </form>
</div>
@endsection
