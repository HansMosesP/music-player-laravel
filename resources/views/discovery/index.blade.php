{{-- Andreas   --}}
<!DOCTYPE html>
<html>
<head>
    <title>Discovery Songs</title>
</head>
<body>

<h1>Discovery Songs</h1>
<p>
    <button type="button" onclick="window.history.back();">Kembali</button>
</p>

@if(isset($fadedSong))
    <h2>Putar Lagu Faded</h2>
    <div>
        <strong>{{ $fadedSong->title }}</strong> - {{ $fadedSong->artist }}
        <div>
            <audio controls preload="none" style="width: 100%; max-width: 500px;" onplay="saveHistory({{ $fadedSong->id }})">
                <source src="{{ asset('storage/Faded.mp3') }}" type="audio/mpeg">
                Browser tidak mendukung pemutar audio.
            </audio>
        </div>
    </div>
    <hr>
@endif

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

<script>
function saveHistory(songId) {
    fetch("{{ route('history.store') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ song_id: songId })
    });
}
</script>

</body>
</html>