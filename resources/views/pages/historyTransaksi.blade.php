@extends('layouts.main')
@section('title', 'Riwayat Transaksi')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header">Riwayat Transaksi</h5>
                @if ($transaksis->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kamar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->nama_penyewa }}</td>
                                    <td>{{ $t->nama_kamar }}</td>
                                    <td>{{ $t->status_transaksi }}</td>
                                    <td>
                                        <button type="button" class="btn btn-icon btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#showTransaksiDetail{{ $t->id_transaksi }}">
                                            <span class="tf-icons bx bx-show"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($transaksis as $t)
                        <div class="modal fade" id="showTransaksiDetail{{ $t->id_transaksi }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalScrollableTitle">Detail Riwayat Transaksi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('riwayat.transaksi', $t->id_transaksi) }}" method="GET">
                                        <div class="modal-body">
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $t->nama_penyewa }}" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Kamar yang dihuni</label>
                                                    <input type="text" class="form-control" name="nama_kamar"
                                                        value="{{ $t->nama_kamar }}" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $t->email }}" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Nomor HP</label>
                                                    <input type="number" class="form-control" name="no_hp"
                                                        value="{{ $t->no_hp }}" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Jenis Kelamin</label>
                                                    <input type="text" class="form-control" name="jenis_kelamin"
                                                        value="{{ $t->jenis_kelamin }}" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-2 col-md-6">
                                                    <label class="form-label" for="alamat">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                                        readonly value="{{ old('alamat', $t->alamat) }}" />
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label class="form-label" for="pekerjaan">Pekerjaan</label>
                                                    <input type="text" class="form-control" id="pekerjaan"
                                                        name="pekerjaan" readonly
                                                        value="{{ old('pekerjaan', $t->pekerjaan) }}" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-2 col-md-6">
                                                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tgl_lahir"
                                                        name="tgl_lahir" readonly
                                                        value="{{ old('tgl_lahir', $t->tgl_lahir) }}" />
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label for="formFile" class="form-label">Foto KTP</label>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button type="button" class="btn btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalFotoKtp{{ $t->id_transaksi }}">Lihat
                                                                Foto
                                                                KTP</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-2 col-md-4">
                                                    <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                                                    <input type="date" class="form-control" id="tanggal_masuk"
                                                        name="tanggal_masuk" readonly
                                                        value="{{ old('tanggal_masuk', $t->tanggal_masuk) }}" />
                                                </div>
                                                <div class="mb-2 col-md-4">
                                                    <label class="form-label" for="tanggal_keluar">Tanggal Keluar</label>
                                                    <input type="date" class="form-control" id="tanggal_keluar"
                                                        name="tanggal_keluar" readonly
                                                        value="{{ old('tanggal_keluar', $t->tanggal_keluar) }}" />
                                                </div>
                                                <div class="mb-2 col-md-4">
                                                    <label class="form-label" for="biaya">Total Biaya</label>
                                                    <input type="number" class="form-control" id="biaya"
                                                        name="biaya" readonly value="{{ old('biaya', $t->biaya) }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Modal Foto KTP -->
                    <div class="modal fade" id="modalFotoKtp{{ $t->id_transaksi }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Foto KTP</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset($t->foto_ktp) }}" class="img-fluid"
                                        style="max-width: 100%; max-height: 350px" alt="Foto KTP">
                                </div>
                                <div class="modal-footer d-grid">
                                    <button type="button" class="btn btn-secondary " data-bs-toggle="modal"
                                        data-bs-target="#showTransaksiDetail{{ $t->id_transaksi }}">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Tidak ada data transaksi yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
