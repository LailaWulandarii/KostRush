@extends('layouts.main')
@section('title', 'Data Penghuni')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header">Data Penghuni</h5>
                <div class="table-responsive text-nowrap">
                    <button type="button" class="btn btn-primary" style="margin-left: 20px;" data-bs-toggle="modal"
                        data-bs-target="#modalPenghuni">
                        <span class="tf-icons bx bx-user-plus"></span>&nbsp; Tambah Penghuni
                    </button>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                {{-- <th>Kamar</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($penghuni as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->no_hp }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalPenghuni{{ $p->id }}">
                                            Edit Siswa
                                        </button>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#hapusUser{{ $p->id }}">Hapus</button>
                                    </td>
                                </tr>
                                <!-- MODAL TAMBAH DAN UPDATE -->
                                <div class="modal fade" id="modalPenghuni" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalScrollableTitle">
                                                    @if ($p->id)
                                                        Edit
                                                    @else
                                                        Tambah
                                                    @endif Penghuni
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ $p->id ? url('penghuni/' . $p->id) : url('penghuni') }}">
                                                    @csrf
                                                    @if ($p->id)
                                                        @method('PUT')
                                                    @endif
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="name">Nama
                                                            Lengkap</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-fullname2"
                                                                    class="input-group-text"><i
                                                                        class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" placeholder=""
                                                                    aria-describedby="basic-icon-default-fullname2" />
                                                            </div>
                                                            @error('name')
                                                                <small>{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 form-label" for="no_hp">No. HP</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-message2"
                                                                    class="input-group-text"><i
                                                                        class="bx bx-buildings"></i></span>
                                                                <textarea id="no_hp" name="no_hp" class="form-control" placeholder=""
                                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                                            </div>
                                                            @error('no_hp')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label"
                                                            for="alamat">Alamat</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-fullname2"
                                                                    class="input-group-text"><i
                                                                        class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control" id="alamat"
                                                                    name="alamat" placeholder=""
                                                                    aria-describedby="basic-icon-default-fullname2" />
                                                            </div>
                                                            @error('alamat')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 form-label" for="pekerjaan">Pekerjaan</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-message2"
                                                                    class="input-group-text"><i
                                                                        class="bx bx-buildings"></i></span>
                                                                <textarea id="pekerjaan" name="pekerjaan" class="form-control" placeholder=""
                                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                                            </div>
                                                            @error('pekerjaan')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 form-label" for="jenis_kelamin">Jenis
                                                            Kelamin</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-message2"
                                                                    class="input-group-text"><i
                                                                        class="bx bx-buildings"></i></span>
                                                                <textarea id="jenis_kelamin" name="jenis_kelamin" class="form-control" placeholder=""
                                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                                            </div>
                                                            @error('jenis_kelamin')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 form-label" for="tgl_lahir">Tanggal
                                                            Lahir</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-message2"
                                                                    class="input-group-text"><i
                                                                        class="bx bx-buildings"></i></span>
                                                                <textarea id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder=""
                                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                                            </div>
                                                            @error('tgl_lahir')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 form-label" for="name">Kamar</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-message2"
                                                                    class="input-group-text"><i
                                                                        class="bx bx-buildings"></i></span>
                                                                <textarea id="name" name="name" class="form-control" placeholder=""
                                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                                            </div>
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                                    <button type="reset"
                                                        class="btn btn-outline-secondary">Batalkan</button>
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
            {{-- <div class="col-lg-4 col-md-3">
            </div> --}}
        </div>
    </div>
@endsection
