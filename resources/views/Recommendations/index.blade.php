// Calvin
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Lagu</title>
</head>
<body>
    <h1>Ini Adalah Daftar Rekomendasi Musik Untuk Kamu, Enjoy!!</h1>
    
    <ul>
        @forelse($recommendations as $music)
            <li><strong>{{ $music->song_title }}</strong> - {{ $music->artist }} (Alasan: {{ $music->reason }})</li>
        @empty
            <p>Belum ada rekomendasi lagu saat ini.</p>
        @endforelse
    </ul>
</body>
</html>