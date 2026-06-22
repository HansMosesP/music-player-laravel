<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Lagu</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">

    <h2>Riwayat Putar Lagu</h2>

    @if(session('success'))
        <div style="color: green; font-weight: bold; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    @if($history->isEmpty())
        <p>Kamu belum memutar lagu apapun.</p>
    @else
        <ul>
            @foreach($history as $item)
                <li style="margin-bottom: 10px;">
                    @if($item->song)
                        <strong>{{ $item->song->title }}</strong> oleh {{ $item->song->artist }}
                        
                        @if($item->song->album)
                            <br>
                            <small>Album: {{ $item->song->album }}</small>
                        @endif
                    @else
                        <strong>Lagu sudah tidak tersedia.</strong>
                    @endif

                    <form action="{{ route('history.destroy', $item->id) }}" method="POST" style="display:inline; margin-left: 10px;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Hapus dari riwayat?')" style="background-color: red; color: white; border: none; padding: 3px 8px; border-radius: 3px; cursor: pointer;">
                            Hapus
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

    <br>

    <a href="{{ url('/') }}" style="text-decoration: none; color: blue;">
        &larr; Kembali ke Home
    </a>

</body>
</html>