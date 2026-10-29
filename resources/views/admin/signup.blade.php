<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account — MAH</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="login-page">
<main class="login-card">
    <a class="admin-brand" href="{{ route('portfolio.home') }}">MAH<span>.</span> <small>PORTFOLIO ADMIN</small></a>
    <p class="eyebrow">CREATE ACCOUNT</p>
    <h1>Join the workspace.</h1>
    <p class="muted">Create an account. Admin access is granted separately for security.</p>
    @if ($errors->any())<div class="alert alert-error">{{ $errors->first() }}</div>@endif
    <form method="POST" action="{{ route('admin.signup.store') }}">
        @csrf
        <label>Full name<input type="text" name="name" value="{{ old('name') }}" autocomplete="name" maxlength="120" required autofocus></label>
        <label>Email address<input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required></label>
        <label>Password <small>(at least 12 characters)</small><input type="password" name="password" autocomplete="new-password" minlength="12" required></label>
        <label>Confirm password<input type="password" name="password_confirmation" autocomplete="new-password" minlength="12" required></label>
        <button class="btn btn-primary" type="submit">Create account <span>↗</span></button>
    </form>
    <p class="muted">Already have an account? <a class="inline-link" href="{{ route('admin.login') }}">Sign in</a></p>
    <a class="back-link" href="{{ route('portfolio.home') }}">← Back to portfolio</a>
</main>
</body>
</html>
