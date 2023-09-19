<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="page-title">{{ $title ?? 'Create' }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
</head>
<body>
    <header id="home-header">
        <h1>Create</h1>
    </header>

    <nav>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('redirect') }}">Dashboard</a>
    <a href="{{ route('view') }}">View</a>
    @if(session()->has('user_id'))
        <a href="{{ url('/logout') }}">Logout</a>
    @endif
    </nav>

    <section id="create-section">
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="create-form" method="POST" action="{{ route('create') }}" >
            @csrf
            <label for="title">Title(Required)</label>
            <input type="text" name="title" placeholder="Title">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" placeholder="Start Date">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" placeholder="End Date">
            <label for="phase">Phase</label>
            <select name="phase">
                <option></option>
                <option>design</option>
                <option>development</option>
                <option>testing</option>
                <option>deployment</option>
                <option>complete</option>
            </select>
            <label for="description">Description</label><br>
            <textarea name="description" placeholder="Description:" rows="4" cols="40"></textarea>
            <input type="submit"value="Submit" id="submit"/>
        </form>

    </section>
</body>
</html>
