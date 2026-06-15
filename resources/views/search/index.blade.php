<!DOCTYPE html>
<html>
<head>
    <title>Search Songs</title>
</head>
<body>

<h1>Search Songs</h1>

<form action="{{ route('search.index') }}" method="GET">
    <input
        type="text"
        name="keyword"
        placeholder="Search song..."
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
            <h3>{{ $song->title }}</h3>

            <p>
                Artist: {{ $song->artist }}
            </p>

            <p>
                Album: {{ $song->album }}
            </p>

            <p>
                Views: {{ $song->views }}
            </p>
        </div>

        <hr>

    @endforeach

@else

    <p>No songs found.</p>

@endif

</body>
</html> 
