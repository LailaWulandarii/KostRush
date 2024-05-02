<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kamar</title>
</head>
<body>
    <h1>Tambah Data Kamar</h1>
    <form action="/tambah-data-kamar" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nama_kamar">Nama Kamar:</label>
            <input type="text" id="nama_kamar" name="nama_kamar" required>
        </div>

        <div>
            <label for="foto">Foto Kamar:</label>
            <input type="file" id="foto" name="foto[]" accept="image/*" multiple required>
            <small>Maksimal 2MB per foto. Anda dapat memilih beberapa foto.</small>
        </div>
        <button type="submit">Simpan</button>
    </form>
    
    @if(isset($fotoKamar) && count($fotoKamar) > 0)
    <h2>Foto-foto Kamar</h2>
    @foreach ($fotoKamar as $foto)
        <img src="{{ Storage::url($foto->foto_kamar) }}" alt="Foto Kamar">
    @endforeach
    @endif
</body>
</html>
