<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lirik Lagu</title>
</head>
<body>
    <h1>{{ $song->title }}</h1>
    <h2>{{ $song->artist }}</h2>

    <p>
        <a href="{{ route('lyrics.index') }}">Kembali ke daftar lirik</a>
    </p>

    @if($song->lyrics)
        <pre style="white-space: pre-wrap; font-family: inherit;">{{ $song->lyrics }}</pre>
    @else
        <p>Belum ada lirik untuk lagu ini.</p>
    @endif
</body>
</html>