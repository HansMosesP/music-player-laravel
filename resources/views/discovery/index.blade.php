{{-- Andreas   --}}
<!DOCTYPE html>
<html>
<head>
    <title>Discovery Songs</title>
</head>
<body>

<h1>Discovery Songs</h1>

<h2>Latest Songs</h2>

@foreach($latestSongs as $song)

    <div>
        <strong>{{ $song->title }}</strong>
        -
        {{ $song->artist }}
    </div>

@endforeach

<hr>

<h2>Popular Song</h2>

@foreach($popularSongs as $song)

    <div>
        <strong>{{ $song->title }}</strong>
        -
        {{ $song->artist }}
        ({{ $song->views }} views)
    </div>

@endforeach

</body>
</html> 
