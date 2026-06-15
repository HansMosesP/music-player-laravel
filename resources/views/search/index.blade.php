<!DOCTYPE html>
<html>
<head>
    <title>Search Songs</title>
</head>
<body>

<h1>Search Recommendations</h1>

<form action="{{ route('search.index') }}" method="GET">
    <input
        type="text"
        name="keyword"
        placeholder="Search recommendations..."
        value="{{ request('keyword') }}"
    >

    <button type="submit">
        Search
    </button>
</form>

<hr>

@if($songs->count())

    @foreach($songs as $song)

        <div>
            <h3>{{ $song->song_title }}</h3>

            <p>
                Artist: {{ $song->artist }}
            </p>

            <p>
                Reason: {{ $song->reason }}
            </p>
        </div>

        <hr>

    @endforeach

@else

    <p>No recommendations found.</p>

@endif

</body>
</html> 
