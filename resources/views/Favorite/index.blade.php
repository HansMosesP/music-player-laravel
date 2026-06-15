<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lagu Favorit</title>
</head>
<body>
    <h1>Lagu Favorit Saya</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('recommendations.index') }}">Kembali ke Rekomendasi</a>
    <hr>

    @if($favorites->isEmpty())
        <p>Belum ada lagu favorit.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Judul Lagu</th>
                    <th>Artis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($favorites as $fav)
                    <tr>
                        <td>{{ $fav->song_title }}</td>
                        <td>{{ $fav->artist }}</td>
                        <td>
                            <form action="{{ route('favorite.toggle') }}" method="POST">
                                @csrf
                                <input type="hidden" name="song_title" value="{{ $fav->song_title }}">
                                <input type="hidden" name="artist" value="{{ $fav->artist }}">
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>