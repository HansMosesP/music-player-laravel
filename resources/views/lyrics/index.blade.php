<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lyrics</title>
</head>
<body>
    <h1>Daftar Lirik Lagu</h1>

    <p>
        <a href="{{ route('recommendations.index') }}">Kembali ke Rekomendasi</a>
    </p>

    @if($songs->isEmpty())
        <p>Belum ada lirik lagu di database.</p>
    @else
        <ul>
            @foreach($songs as $song)
                <li>
                    <strong>{{ $song->title }}</strong> - {{ $song->artist }}
                    <div>
                        <a href="{{ route('lyrics.show', $song->id) }}">Lihat lirik</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>