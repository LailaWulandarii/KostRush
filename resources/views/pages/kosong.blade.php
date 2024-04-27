<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kamar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @foreach ($penghuni as $p)
    <li>{{ $p->name }} - {{ $p->email }}</li>
    @if ($p->penghuniKamar)
        <li>Nama Kamar: {{ $p->penghuniKamar->nama_kamar }}</li>
    @else
        <li>Penghuni tidak memiliki kamar.</li>
    @endif
    
    @if ($p->transaksis->isNotEmpty())
        @foreach ($p->transaksis as $transaksi)
            <li>Biaya Transaksi: {{ $transaksi->biaya }}</li>
        @endforeach
    @else
        <li>Penghuni tidak memiliki transaksi.</li>
    @endif
@endforeach



    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
