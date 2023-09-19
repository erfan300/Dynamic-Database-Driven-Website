<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="page-title">{{ $title ?? 'Register' }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
</head>
<body>
    <header id="home-header">
        <h1>AProject</h1>
    </header>

    <nav>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('redirect') }}">Dashboard</a>
    <a href="{{ route('view') }}">View</a>
    

    </nav>

    <section id="register-section">
    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif
        <form id="register-form" method="POST" action="{{ route('register') }}" >
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" />

            <input type="email" name="email"  placeholder="Email Address" />
            <input type="email" name="email_confirmation"  placeholder="Confirm Email Address"  />

            <input type="submit"value="Submit" id="submit"/>
            <a href="{{ route('login') }}">Already registered</a>

        </form>
    </section>
</body>
</html>

