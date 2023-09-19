
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header id="home-header">
    <h1>Search Results for "{{ $q }}"</h1>
    </header>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('redirect') }}">Dashboard</a>
        <a href="{{ route('view') }}">View</a>
        <form class="search-form" action="{{ route('search') }}" method="GET">
            @csrf
            <input class="search-input" type="text" name="q" placeholder="Search projects by title or end date...">
            <button class="search-btn" type="submit">Search</button>
        </form>
    </nav>
    
<main class="view-main">
    @if(count($projects) > 0)
        <table class="project-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Phase</th>
                <th>Description</th>
                <th>Email</th>
                <th>Operation</th>
            </tr>
            </thead>
            @foreach($projects as $project)
                <tr>
                    <td><a href="{{ url('/project/'.$project->title) }}">{{ $project->title }}</a></td>
                    <td>{{$project->start_date}}</td>
                    <td>{{$project->end_date}}</td>
                    <td>{{$project->phase}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->email}}</td>
                    <td>
                    @if($project->uid == session('user_id'))
                        <a href="{{ route('update', $project->title) }}">Update</a>
                    @endif
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No results found.</p>
    @endif
    </main>
</body>
</html>
