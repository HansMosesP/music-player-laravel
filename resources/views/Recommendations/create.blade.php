<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekomendasi Lagu</title>
</head>
<body>

    <h2>Tambah Rekomendasi Lagu</h2>

    <form action="/recommendations" method="POST">
        @csrf 

        <p>
            <label for="song_id"><b>Pilih Lagu:</b></label><br>
            <select id="song_id" name="song_id" required>
                <option value="">-- Pilih lagu dari database --</option>
                @foreach($songs as $song)
                    <option
                        value="{{ $song->id }}"
                        data-title="{{ $song->title }}"
                        data-artist="{{ $song->artist }}"
                        data-lyrics="{{ e($song->lyrics ?? '') }}"
                    >
                        {{ $song->title }} - {{ $song->artist }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="song_title"><b>Judul Lagu:</b></label><br>
            <input type="text" id="song_title" name="song_title" readonly>
        </p>

        <p>
            <label for="artist"><b>Nama Penyanyi / Band:</b></label><br>
            <input type="text" id="artist" name="artist" readonly>
        </p>

        <p>
            <label for="lyrics_preview"><b>Lirik Lagu:</b></label><br>
            <textarea id="lyrics_preview" rows="8" cols="60" readonly placeholder="Pilih lagu untuk menampilkan lirik..."></textarea>
        </p>

        <p>
            <label for="reason"><b>Alasan Direkomendasikan:</b></label><br>
            <textarea id="reason" name="reason" rows="4" cols="40" placeholder="Tuliskan alasan kamu menyukai lagu ini..." required></textarea>
        </p>

        <p>
            <button type="submit">Simpan Rekomendasi</button>
            <br><br>
            <a href="/recommendations">← Kembali ke Daftar</a>
        </p>
    </form>

    <script>
        const songSelect = document.getElementById('song_id');
        const titleInput = document.getElementById('song_title');
        const artistInput = document.getElementById('artist');
        const lyricsPreview = document.getElementById('lyrics_preview');

        songSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];

            titleInput.value = selectedOption.dataset.title || '';
            artistInput.value = selectedOption.dataset.artist || '';
            lyricsPreview.value = selectedOption.dataset.lyrics || '';
        });
    </script>

</body>
</html>