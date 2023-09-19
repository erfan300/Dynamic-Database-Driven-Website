<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title id="page-title">{{ $title ?? 'Login' }}</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
    </head>

    <body>
        <header id="home-header">
            <h1>
                AProject
            </h1>
        </header>

        
        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('redirect') }}">Dashboard</a>
            <a href="{{ route('view') }}">View</a>

        </nav>

        <section id="login-section">
            <form id="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" id="submit">Submit</button>
                <a href="{{ route('register') }}">Haven't registered before</a>
            </form>
        </section>
       

        
    </body>

</html>
