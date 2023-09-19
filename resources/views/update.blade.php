<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Project</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	<header id="home-header">
	<h1>Update Project</h1>
	</header>
	<nav>
		<a href="{{ route('home') }}">Home</a>
        <a href="{{ route('redirect') }}">Dashboard</a>
        <a href="{{ route('view') }}">View</a>

	</nav>
	<section id="create-section">
    <form id="create-form"method="POST" action="{{ route('update', ['pid' => $data['pid']]) }}">
		@csrf
        <input type="hidden" name="pid" value="{{$data['pid']}}">
		<label for="title">Title(Required)</label>
		<input type="text" name="title" value="{{ $data['title'] }}"><br><br>

		<label for="start_date">Start Date</label>
		<input type="date" name="start_date" value="{{ $data['start_date'] }}"><br><br>

		<label for="end_date">End Date</label>
		<input type="date" name="end_date" value="{{ $data['end_date'] }}"><br><br>

		<label for="phase">Phase</label>
		<select name="phase">
                <option>{{ $data['phase'] }}</option>
				<option></option>
                <option>design</option>
                <option>development</option>
                <option>testing</option>
                <option>deployment</option>
                <option>complete</option>
            </select>
		<label for="description">Description</label><br>
        <textarea name="description" rows="5" cols="50">{{ $data['description'] }}</textarea>

		<input type="submit" value="Update Project">
	</form>
	</section>
</body>
</html>
