<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="view-page">
<header id="home-header">
    <h1>View</h1>
    
</header>

    <nav>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('redirect') }}">Dashboard</a>
    @if(session()->has('user_id'))
        <a href="{{ url('create') }}">Create</a>
        <a href="{{ url('/logout') }}">Logout</a>
    @endif
    <form class="search-form" action="{{ route('search') }}" method="GET">
        @csrf
        <input class="search-input" type="text" name="q" placeholder="Search projects by title or end date...">
        <button class="search-btn" type="submit">Search</button>
    </form>
    </nav>

<main class="view-main">
    <table class="project-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>Description</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td><a href="{{ url('/project/'.$project->title) }}">{{ $project->title }}</a></td>
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->description }}</td>
                <td>
                    @if($project->uid == session('user_id'))
                        <a href="{{ route('update', $project->title) }}">Update</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination-links">
        {{ $projects->links() }}
    </div>
</main>

</body>
</html>
