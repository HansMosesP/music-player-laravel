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
            <li>
                <strong>{{ $music->song_title }}</strong> - {{ $music->artist }} 
                (Alasan: {{ $music->reason }})

                <form action="{{ route('favorite.toggle') }}" method="POST" style="display:inline; margin-left: 10px;">
                    @csrf
                    <input type="hidden" name="song_title" value="{{ $music->song_title }}">
                    <input type="hidden" name="artist" value="{{ $music->artist }}">
                    
                    @if(\App\Models\Favorite::where('user_id', auth()->id())->where('song_title', $music->song_title)->where('artist', $music->artist)->exists())
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