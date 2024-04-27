@extends('layouts.main')
@section('title', 'Data Penghuni')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header">Data Penghuni</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Kamar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($penghuni as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->no_hp }}</td>
                                    <td>
                                        @if ($p->penghuniKamar)
                                            {{ $p->penghuniKamar->nama_kamar }}
                                        @else
                                            Penghuni tidak memiliki kamar
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-icon btn-outline-primary tf-icons bx bx-show"
                                            data-bs-toggle="modal" data-bs-target="#showPenghuni{{ $p->id }}">
                                        </button>
                                        {{-- <button type="button"
                                            class="btn btn-icon btn-outline-primary tf-icons bx bx-edit-alt"
                                            data-bs-toggle="modal" data-bs-target="#updatePenghuni{{ $p->id }}">
                                        </button> --}}
                                    </td>
                                </tr>
                                <!-- MODAL SHOW -->
                                <div class="modal fade" id="showPenghuni{{ $p->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalScrollableTitle">Detail Penghuni</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="GET" action="{{ url('penghuni/' . $p->id) }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="name">Nama Lengkap</label>
                                                            <div class="input-group input-group-merge">
                                                                <span id="name" class="input-group-text"><i
                                                                        class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" readonly
                                                                    value="{{ old('name', $p->name) }}" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="nama_kamar">Kamar yang
                                                                dihuni</label>
                                                            <div class="input-group input-group-merge">
                                                                <span id="nama_kamar" class="input-group-text"><i
                                                                        class="bx bx-building"></i></span>
                                                                <input type="text" class="form-control" id="nama_kamar"
                                                                    name="nama_kamar" readonly
                                                                    value="{{ old('nama_kamar', $p->penghuniKamar->nama_kamar) }}" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="no_hp">No. HP</label>
                                                            <div class="input-group input-group-merge">
                                                                <span id="no_hp" class="input-group-text"><i
                                                                        class="bx bx-phone"></i></span>
                                                                <input type="number" class="form-control" id="no_hp"
                                                                    name="no_hp" readonly
                                                                    value="{{ old('no_hp', $p->no_hp) }}" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="email">E-Mail</label>
                                                            <div class="input-group input-group-merge">
                                                                <span id="email" class="input-group-text"><i
                                                                        class="bx bx-envelope"></i></span>
                                                                <input type="text" class="form-control" id="email"
                                                                    name="email" readonly
                                                                    value="{{ old('email', $p->email) }}" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="jenis_kelamin" class="form-label">Jenis
                                                                Kelamin</label>
                                                            <select class="form-select" id="jenis_kelamin"
                                                                name="jenis_kelamin" disabled
                                                                aria-label="Default select example">
                                                                <option value=""
                                                                    {{ old('jenis_kelamin', $p->jenis_kelamin) == '' ? 'selected' : '' }}>
                                                                    Pilih Jenis Kelamin</option>
                                                                <option value="laki-laki"
                                                                    {{ old('jenis_kelamin', $p->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>
                                                                    Laki-laki</option>
                                                                <option value="perempuan"
                                                                    {{ old('jenis_kelamin', $p->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>
                                                                    Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                                            <div class="input-group input-group-merge">
                                                                <span id="tgl_lahir" class="input-group-text"></i></span>
                                                                <input type="date" class="form-control" id="tgl_lahir"
                                                                    name="tgl_lahir" readonly
                                                                    value="{{ old('tgl_lahir', $p->tgl_lahir) }}" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="alamat">Alamat</label>
                                                            <div class="input-group input-group-merge">
                                                                <span id="alamat" class="input-group-text"><i
                                                                        class="bx bx-buildings"></i></span>
                                                                <input type="text" class="form-control" id="alamat"
                                                                    name="alamat" readonly
                                                                    value="{{ old('alamat', $p->alamat) }}" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label" for="pekerjaan">Pekerjaan</label>
                                                            <div class="input-group input-group-merge">
                                                                <span id="pekerjaan" class="input-group-text"><i
                                                                        class="bx bx-briefcase-alt-2"></i></span>
                                                                <input type="text" class="form-control" id="pekerjaan"
                                                                    name="pekerjaan" readonly
                                                                    value="{{ old('pekerjaan', $p->pekerjaan) }}" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="html5-datetime-local-input"
                                                                class="col-md-6 col-form-label">Tanggal Masuk</label>
                                                            <div class="mb-3">
                                                                <input class="form-control" name="tanggal_masuk"
                                                                    type="date" readonly
                                                                    value="{{ old('tanggal_masuk', $p->transaksis->first()->tanggal_masuk) }}" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="tanggal_keluar"
                                                                class="col-md-6 col-form-label">Tanggal
                                                                Keluar</label>
                                                            <div class="mb-3">
                                                                <input class="form-control" name="tanggal_keluar"
                                                                    type="date" readonly
                                                                    value="{{ old('tanggal_keluar', $p->transaksis->first()->tanggal_keluar) }}" />
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Foto KTP</label>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <button type="button" class="btn btn-primary">Lihat
                                                                        Foto
                                                                        KTP</button>
                                                                    <button type="button" class="btn btn-primary">Unduh
                                                                        Foto
                                                                        KTP</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('layouts.modalPenghuni') --}}
@endsection
