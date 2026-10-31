<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Video editing portfolio of Mohamed Ahmed Abu El-Hagag."><meta name="theme-color" content="#10100f">
<title>{{ $name }} — Video Editor</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body>
<div class="grain" aria-hidden="true"></div>
<header class="site-header"><a class="brand" href="#top"><span class="brand-mark">M</span><span>MAH<span class="accent">.</span></span></a><nav class="nav-links"><a href="#work">Selected work</a><a href="#approach">Approach</a><a href="#contact">Contact</a></nav><a class="header-cta" href="#contact">Let’s talk <span>↗</span></a></header>
<main id="top">
<section class="hero section-wrap">
<div class="hero-copy"><p class="eyebrow"><span class="status-dot"></span> VIDEO EDITOR · GIZA, EGYPT</p><h1>Cut with<br>purpose<span class="accent">.</span><br><span class="outline-text">Feel the story.</span></h1>
<p class="hero-description">I shape raw footage into clear, engaging visual stories — with considered pacing, intentional sound, and a polished finish.</p>
<div class="hero-actions"><a class="button button-light" href="#work">Explore the work <span>↓</span></a><a class="text-link" href="#contact">Get in touch <span>↗</span></a></div>
<div class="hero-meta"><span>EDITING</span><i></i><span>COLOR</span><i></i><span>MOTION</span></div></div>
<div class="hero-art" aria-label="Abstract editing timeline artwork"><div class="art-top"><span>SEQUENCE_001</span><span>24 FPS</span></div>
<div class="art-frame frame-one"><span class="frame-number">A / 01</span><div class="sun"></div><div class="horizon"></div><div class="frame-caption">FIND THE<br>FEELING.</div></div>
<div class="art-frame frame-two"><span class="frame-number">B / 02</span><div class="frame-shape"></div><span class="vertical-word">RHYTHM</span></div>
<div class="timeline"><div class="timeline-ruler"><span>00:00</span><span>00:05</span><span>00:10</span><span>00:15</span></div><div class="track track-a"><b></b><b></b><b></b><b></b></div><div class="track track-b"><b></b><b></b><b></b></div><div class="playhead"></div></div>
<div class="art-bottom"><span>STORY FIRST. ALWAYS.</span><span>◉ 01:24:16</span></div></div><div class="hero-index"><span>01</span><span class="index-line"></span><span>INTRO</span></div>
</section>
<section class="ticker"><div class="ticker-track"><span>VIDEO EDITING</span><b>✳</b><span>COLOR & MOOD</span><b>✳</b><span>MOTION GRAPHICS</span><b>✳</b><span>SHORT-FORM CONTENT</span><b>✳</b><span>VIDEO EDITING</span><b>✳</b><span>COLOR & MOOD</span><b>✳</b></div></section>
<section id="work" class="work-section section-wrap"><div class="section-heading"><div><p class="eyebrow">01 / SELECTED WORK</p><h2>Frames that<br><span class="muted">say something.</span></h2></div><p class="section-intro">A space for visual experiments and editing demos. These are clearly marked placeholders — real client and personal projects can be added here later.</p></div>
<div class="project-grid">
@forelse ($projects as $index => $project)
@php
    $videoUrl = $project->video_url;
    $videoHost = $videoUrl ? parse_url($videoUrl, PHP_URL_HOST) : null;
    $isDirectVideo = $videoUrl && preg_match('/\\.(mp4|webm|ogg)(?:\\?.*)?$/i', $videoUrl);
    $thumbnail = $project->thumbnail_path ? asset($project->thumbnail_path) : $project->thumbnail_url;
@endphp
<article class="project-card">
    @if ($videoUrl)
        <a class="project-visual visual-{{ $project->tone }}" href="{{ $videoUrl }}" target="_blank" rel="noopener noreferrer" aria-label="Watch {{ $project->title }}">
    @else
        <div class="project-visual visual-{{ $project->tone }}">
    @endif
        @if ($thumbnail)
            <img src="{{ $thumbnail }}" alt="{{ $project->title }} thumbnail" loading="lazy" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover">
        @else
            <span class="visual-sun"></span><span class="visual-orbit"></span><span class="visual-graphic-word">{{ $project->tone === 'warm' ? 'STORY' : ($project->tone === 'violet' ? 'PULSE' : 'TYPE') }}</span>
        @endif
        <span class="project-number">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }} / {{ str_pad((string) $projects->count(), 2, '0', STR_PAD_LEFT) }}</span>
        @if ($videoUrl)<span class="play-button" aria-hidden="true">▶</span><span class="demo-label">WATCH PROJECT ↗</span>@else<span class="demo-label">VIDEO COMING SOON</span>@endif
        @if ($project->duration)<span class="project-duration">{{ $project->duration }}</span>@endif
    @if ($videoUrl)</a>@else</div>@endif
    <div class="project-info"><div><p class="project-category">{{ $project->category }}</p><h3>{{ $project->title }}</h3></div>@if ($videoUrl)<a class="project-arrow" href="{{ $videoUrl }}" target="_blank" rel="noopener noreferrer" aria-label="Watch {{ $project->title }}">↗</a>@endif</div>
    @if ($project->description)<p class="project-description">{{ $project->description }}</p>@endif
</article>
@empty
<p class="section-intro">Projects are being prepared. Please check back soon.</p>
@endforelse
</div></section>
<section id="approach" class="approach-section"><div class="section-wrap approach-grid"><div><p class="eyebrow">02 / THE APPROACH</p><h2>Good edits<br>are <span class="accent">felt.</span></h2></div><div class="approach-content"><p class="approach-lead">Every cut has a job. Every frame should move the story forward.</p><p class="approach-body">From the first assembly to the final export, the focus stays on clarity, rhythm, and the emotion behind the footage. The goal is not to add more — it is to make every choice count.</p>
<div class="skills-grid"><div class="skill"><span>01</span><div><h3>Editing & pacing</h3><p>Structure, timing, transitions, and story flow.</p></div></div><div class="skill"><span>02</span><div><h3>Color & atmosphere</h3><p>Consistent color, contrast, and visual mood.</p></div></div><div class="skill"><span>03</span><div><h3>Sound & polish</h3><p>Audio balance, music timing, and clean finishing.</p></div></div><div class="skill"><span>04</span><div><h3>Motion & titles</h3><p>Typography, simple motion graphics, and visual accents.</p></div></div></div></div></div></section>
<section class="tool-section section-wrap"><div class="tool-heading"><p class="eyebrow">03 / WORKFLOW</p><h2>The tools behind<br><span class="muted">the timeline.</span></h2></div><div class="tools-list"><div class="tool-row"><span class="tool-index">01</span><span class="tool-name">Adobe Premiere Pro</span><span class="tool-type">VIDEO EDITING</span><span class="tool-symbol">↗</span></div><div class="tool-row"><span class="tool-index">02</span><span class="tool-name">DaVinci Resolve</span><span class="tool-type">EDIT / COLOR</span><span class="tool-symbol">↗</span></div><div class="tool-row"><span class="tool-index">03</span><span class="tool-name">Adobe After Effects</span><span class="tool-type">MOTION GRAPHICS</span><span class="tool-symbol">↗</span></div></div><p class="tool-footnote">Adjust this list to reflect the exact software and workflows used.</p></section>
<section id="contact" class="contact-section section-wrap">
    <p class="eyebrow">04 / YOUR NEXT PROJECT</p><h2>Have a story<br>to <span class="accent">tell?</span></h2><p class="contact-copy">Tell me what you are making. Let’s find the right pace, tone, and finish for it.</p>
    <div class="contact-actions"><a class="button button-light" href="mailto:{{ $email }}">Email me <span>↗</span></a><a class="button button-outline" href="tel:{{ preg_replace('/\D+/', '', $phone) }}">Call me <span>↗</span></a></div>
<div class="contact-details"><div><span class="detail-label">EMAIL</span><a href="mailto:{{ $email }}">{{ $email }}</a></div><div><span class="detail-label">PHONE</span><a href="tel:{{ preg_replace('/\D+/', '', $phone) }}">{{ $phone }}</a></div><div><span class="detail-label">LOCATION</span><span>Giza, Egypt</span></div></div></section>
</main>
<footer class="site-footer"><a class="brand" href="#top"><span class="brand-mark">M</span><span>MAH<span class="accent">.</span></span></a><span>MADE TO MOVE YOU.</span><span>© {{ date('Y') }} {{ $name }}</span></footer>
<div class="demo-modal" data-demo-modal aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="demo-modal-title"><div class="modal-backdrop" data-demo-close></div><div class="modal-panel"><button class="modal-close" type="button" data-demo-close aria-label="Close dialog">×</button><p class="eyebrow">DEMO PLACEHOLDER</p><h2 id="demo-modal-title">Demo concept</h2><div class="modal-screen"><span class="modal-play">▶</span><span>REPLACE WITH A REAL VIDEO</span></div><p>This card is a design placeholder, not a completed client project. Add a real, approved video file when it is ready.</p><button class="button button-light" type="button" data-demo-close>Back to portfolio <span>↗</span></button></div></div>
<script src="{{ asset('js/portfolio.js') }}" defer></script>
</body></html>