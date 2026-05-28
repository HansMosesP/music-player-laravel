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
            <label for="song_title"><b>Judul Lagu:</b></label><br>
            <input type="text" id="song_title" name="song_title" placeholder="Contoh: Tak Segampang Itu" required>
        </p>

        <p>
            <label for="artist"><b>Nama Penyanyi / Band:</b></label><br>
            <input type="text" id="artist" name="artist" placeholder="Contoh: Anggis Devaki" required>
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

</body>
</html>