<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="page-title">{{ $title ?? 'AProject' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header id="home-header">
        <h1>AProject</h1>
    </header>
    <nav>
    @if(session()->has('user_id'))
        <a href="{{ url('/logout') }}">Logout</a>
    @endif
    </nav>
    <section id="home-forms">
        <div id="registration-containers">
            <div class="initial-forms">
                <a href="{{ route('register') }}">Register</a>
            </div>
            <div class="initial-forms">
                <a href="{{ route('login') }}">Log-in</a>
            </div>
            <div class="initial-forms">
                <a href="{{ route('redirect') }}">Dashboard</a>
            </div>

            
        </div>
    </section>
</body>
</html>
