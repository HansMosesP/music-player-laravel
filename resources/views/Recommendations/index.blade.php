{{-- Calvin & Hans   --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Lagu</title>
</head>
<body>
    <h1>Ini Adalah Daftar Rekomendasi Musik Untuk Kamu, Selamat Mendengarkan!</h1>

    <p>
        Login sebagai: <strong>{{ auth()->user()->name }}</strong>
    </p>

    <p>
        <a href="{{ route('recommendations.create') }}">
            <button type="button">+ Tambah Rekomendasi Baru</button>
        </a>
    </p>

    <p>
        <a href="{{ route('discovery.index') }}">
            <button type="button">Discovery Lagu</button>
        </a>
    </p>

    <p>
        <a href="{{ route('search.index') }}">
            <button type="button">Cari Lagu</button>
        </a>
    </p>

    <p>
        <a href="{{ route('favorite.index') }}">
            <button type="button">⭐ Lihat Lagu Favorit</button>
        </a>
    </p>

    <p>
        <a href="{{ route('lyrics.index') }}">
            <button type="button">Lihat Semua Lirik</button>
        </a>
    </p>

    @if(session('success'))
        <p style="color: green;"><b>{{ session('success') }}</b></p>
    @endif
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <p><a href="{{ route('profile') }}">Profile</a></p>

    <br>
    <hr>
    <br>

    <ul>
        @foreach($recommendations as $music)
            @php
                $displaySong = $music->song ?? $music;
                $songTitle = $displaySong->title ?? $music->song_title;
                $artist = $displaySong->artist ?? $music->artist;
                $lyrics = $displaySong->lyrics ?? null;
            @endphp
            <li>
                <strong>{{ $songTitle }}</strong> - {{ $artist }} 
                (Alasan: {{ $music->reason }})

                @if($lyrics)
                    <div style="margin-top: 8px; white-space: pre-wrap;">
                        <b>Lirik:</b><br>
                        {{ $lyrics }}
                    </div>
                @endif

                <div style="margin-top: 8px;">
                    <a href="{{ route('lyrics.show', $displaySong->id) }}">Buka halaman lirik</a>
                </div>

                <form action="{{ route('favorite.toggle') }}" method="POST" style="display:inline; margin-left: 10px;">
                    @csrf
                    <input type="hidden" name="song_title" value="{{ $songTitle }}">
                    <input type="hidden" name="artist" value="{{ $artist }}">
                    
                    @if(in_array($songTitle . '|' . $artist, $favoriteKeys))
                        <button type="submit">❌ Hapus Favorit</button>
                    @else
                        <button type="submit">➕ Tambah Favorit</button>
                    @endif
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>