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
        <h1>Dashboard</h1>
    </header>

    <nav>
    <a href="{{ route('home') }}">Home</a>
    @if(session()->has('user_id'))
        <a href="{{ url('/logout') }}">Logout</a>
    @endif
    </nav>



    <section id="redirection">
        <div id="redirectionn-containers">
            <div class="initial-redirection">
                <a href="{{ route('view') }}">View</a>
            </div>
            <div class="initial-redirection">
                <a href="{{ route('create') }}">Create</a>
            </div>
            
        </div>
    </section>
</body>
</html>