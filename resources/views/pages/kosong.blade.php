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
    <h1>Data Transaksi</h1>

    @if ($transaksis->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Pengguna</th>
                    <th>Kamar</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id_transaksi }}</td>
                        <td>{{ $transaksi->user_name }}</td>
                        <td>{{ $transaksi->kamar_name }}</td>
                        <td>
                            <button type="button" class="btn btn-icon btn-outline-primary tf-icons bx bx-show"
                                data-toggle="modal" data-target="#showPenghuni{{ $transaksi->id_transaksi }}">
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal -->
        @foreach ($transaksis as $transaksi)
            <div class="modal fade" id="showPenghuni{{ $transaksi->id_transaksi }}" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalScrollableTitle">Detail Penghuni</h5>
                            <button type="button" class="btn-close" data-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="GET" action="{{ url('transaksi') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">ID Transaksi</label>
                                    <input type="text" class="form-control" name="id"
                                        value="{{ $transaksi->id_transaksi }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" name="user_name"
                                        value="{{ $transaksi->user_name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kamar</label>
                                    <input type="text" class="form-control" name="kamar_name"
                                        value="{{ $transaksi->kamar_name }}" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>

