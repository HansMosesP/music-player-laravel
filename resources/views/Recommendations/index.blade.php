{{-- Calvin & Hans --}}
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

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <br>
    <hr>
    <br>

    <ul>
        @forelse($recommendations as $music)
            <li>
                <strong>{{ $music->song_title }}</strong> - {{ $music->artist }} 
                (Alasan: {{ $music->reason }})
            </li>
        @empty
            <p>Belum ada rekomendasi lagu saat ini.</p>
        @endforelse
    </ul>
</body>
</html>