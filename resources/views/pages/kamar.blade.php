@extends('layouts.main')
@section('title', 'Data Kamar')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="table-responsive text-nowrap">
                <a href="#" class="btn btn-primary" style="margin-left: 20px;" data-bs-toggle="modal"
                    data-bs-target="#createKamar">
                    <span class="tf-icons bx bx-user-plus"></span>&nbsp; Tambah Kamar
                </a>
                <div class="row mb-5">
                    @foreach ($kamars as $kamar)
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100">
                                <!-- Menambahkan perulangan foreach untuk foto-foto kamar -->
                                @foreach ($kamar->fotoKamar as $foto)
                                    <img class="card-img-top" src="{{ $foto->url }}" alt="Card image cap" />
                                @endforeach
                                <div class="card-body">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <h5 class="card-title">{{ $kamar->nama_kamar }}</h5>
                                        @if ($kamar->status == 'terisi')
                                            <a class="badge bg-label-danger">Terisi</a>
                                        @else
                                            <a class="badge bg-label-success">Kosong</a>
                                        @endif
                                    </div>
                                    <a href="#" class="btn btn-icon btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#showKamarDetail">
                                        <span class="tf-icons bx bx-show"></span>
                                    </a>
                                    <a href="#" class="btn btn-icon btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#showKamarEdit" onclick="editKamar({{ $kamar->id }})">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </a>
                                    <a href="{{ url('users/' . $kamar->id_kamar . '/delete') }}"
                                        onclick="return confirm('Apakah kamu yakin akan menghapus data ini?')"
                                        class="btn btn-icon btn-outline-primary"><span
                                            class="tf-icons bx bx-trash"></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-lg-4 col-md-3">
                    <!-- Modal -->
                    <div class="modal fade" id="createKamar" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalScrollableTitle">Detail Kamar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xl">
                                        <form method="POST"
                                            action="{{ isset($kamar) ? route('users.update', $kamar->id_kamar) : route('users.store') }}">
                                            @csrf
                                            @if (isset($kamar))
                                                @method('PUT')
                                            @endif
                                            <div class="mb-3">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img src="../assets/img/avatars/1.png" alt="user-avatar"
                                                        class="d-block rounded" height="100" width="100"
                                                        id="uploadedAvatar" />
                                                    <div class="button-wrapper">
                                                        <label for="upload" class="btn btn-primary me-2 mb-4"
                                                            tabindex="0">
                                                            <span class="d-none d-sm-block">Unggah Foto</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" class="account-file-input"
                                                                hidden accept="image/png, image/jpeg" />
                                                        </label>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary account-image-reset mb-4">
                                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Reset</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <label class="form-label" for="nama_kamar">
                                                    Nama Kamar</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="nama_kamar" class="input-group-text"><i
                                                            class="bx bx-user"></i></span>
                                                    <input type="text" class="form-control" id="nama_kamar"
                                                        placeholder="Masukkan nama kamar"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                        value="{{ isset($kamar) ? $kamar->nama_kamar : '' }}" readonly />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="fasilitas_kamar">Fasilitas Kamar</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="fasilitas_kamar" class="input-group-text"><i
                                                            class="bx bx-comment"></i></span>
                                                    <textarea id="fasilitas_kamar" class="form-control" placeholder="Deskripsikan fasilitas kamar" readonly
                                                        aria-describedby="basic-icon-default-message2">{{ isset($kamar) ? $kamar->fasilitas_kamar : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="harga_harian">Harga Harian</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="harga_harian" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                    <input type="text" id="harga_harian" class="form-control"
                                                        placeholder="Masukkan harga harian (opsional)"
                                                        aria-describedby="basic-icon-default-company2" readonly
                                                        value="{{ isset($kamar) ? $kamar->harga_harian : '' }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="harga_harian">Harga Bulanan</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="harga_bulanan" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                    <input type="text" id="harga_bulanan" class="form-control"
                                                        placeholder="Masukkan harga bulanan (opsional)"
                                                        aria-describedby="basic-icon-default-company2" readonly
                                                        value="{{ isset($kamar) ? $kamar->harga_bulanan : '' }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <select id="status" name="status" id="defaultSelect" disabled
                                                    class="form-select">
                                                    <option value="laki-laki"
                                                        {{ isset($kamar) && $kamar->status == 'terisi' ? 'selected' : '' }}>
                                                        Terisi</option>
                                                    <option value="perempuan"
                                                        {{ isset($kamar) && $kamar->status == 'kosong' ? 'selected' : '' }}>
                                                        Kosong</option>
                                                </select>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="showKamarDetail" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalScrollableTitle">Detail Kamar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xl">
                                        <form method="POST"
                                            action="{{ isset($kamar) ? route('users.update', $kamar->id_kamar) : route('users.store') }}">
                                            @csrf
                                            @if (isset($kamar))
                                                @method('PUT')
                                            @endif
                                            <div class="mb-3">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img src="../assets/img/avatars/1.png" alt="user-avatar"
                                                        class="d-block rounded" height="100" width="100"
                                                        id="uploadedAvatar" />
                                                    <div class="button-wrapper">
                                                        <label for="upload" class="btn btn-primary me-2 mb-4"
                                                            tabindex="0">
                                                            <span class="d-none d-sm-block">Unggah Foto</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload"
                                                                class="account-file-input" hidden
                                                                accept="image/png, image/jpeg" />
                                                        </label>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary account-image-reset mb-4">
                                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Reset</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <label class="form-label" for="nama_kamar">
                                                    Nama Kamar</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="nama_kamar" class="input-group-text"><i
                                                            class="bx bx-user"></i></span>
                                                    <input type="text" class="form-control" id="nama_kamar"
                                                        placeholder="Masukkan nama kamar"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                        value="{{ isset($kamar) ? $kamar->nama_kamar : '' }}" readonly />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="fasilitas_kamar">Fasilitas Kamar</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="fasilitas_kamar" class="input-group-text"><i
                                                            class="bx bx-comment"></i></span>
                                                    <textarea id="fasilitas_kamar" class="form-control" placeholder="Deskripsikan fasilitas kamar" readonly
                                                        aria-describedby="basic-icon-default-message2">{{ isset($kamar) ? $kamar->fasilitas_kamar : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="harga_harian">Harga Harian</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="harga_harian" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                    <input type="text" id="harga_harian" class="form-control"
                                                        placeholder="Masukkan harga harian (opsional)"
                                                        aria-describedby="basic-icon-default-company2" readonly
                                                        value="{{ isset($kamar) ? $kamar->harga_harian : '' }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="harga_harian">Harga Bulanan</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="harga_bulanan" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                    <input type="text" id="harga_bulanan" class="form-control"
                                                        placeholder="Masukkan harga bulanan (opsional)"
                                                        aria-describedby="basic-icon-default-company2" readonly
                                                        value="{{ isset($kamar) ? $kamar->harga_bulanan : '' }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <select id="status" name="status" id="defaultSelect" disabled
                                                    class="form-select">
                                                    <option value="laki-laki"
                                                        {{ isset($kamar) && $kamar->status == 'terisi' ? 'selected' : '' }}>
                                                        Terisi</option>
                                                    <option value="perempuan"
                                                        {{ isset($kamar) && $kamar->status == 'kosong' ? 'selected' : '' }}>
                                                        Kosong</option>
                                                </select>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="showKamarEdit" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalScrollableTitle">Edit Kamar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xl">
                                        <form method="POST"
                                            action="{{ isset($kamar) ? route('kamar.update', $kamar->id_kamar) : route('kamar.store') }}">
                                            @csrf
                                            @if (isset($kamar))
                                                @method('PUT')
                                            @endif
                                            <div class="mb-3">
                                                <label class="form-label" for="nama_kamar">
                                                    Nama Kamar</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="nama_kamar" class="input-group-text"><i
                                                            class="bx bx-user"></i></span>
                                                    <input type="text" class="form-control" id="nama_kamar"
                                                        placeholder="Masukkan nama kamar"
                                                        aria-describedby="basic-icon-default-fullname2"
                                                        value="{{ isset($kamar) ? $kamar->nama_kamar : '' }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="fasilitas_kamar">Fasilitas
                                                    Kamar</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="fasilitas_kamar" class="input-group-text"><i
                                                            class="bx bx-comment"></i></span>
                                                    <textarea id="fasilitas_kamar" name="fasilitas_kamar" class="form-control"
                                                        placeholder="Deskripsikan fasilitas kamar" aria-describedby="basic-icon-default-message2" " >{{ isset($kamar) ? $kamar->fasilitas_kamar : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="harga_harian">Harga Harian</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="harga_harian" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                    <input type="text" id="harga_harian" class="form-control"
                                                        placeholder="Masukkan harga harian (opsional)"
                                                        aria-describedby="basic-icon-default-company2"
                                                        value="{{ isset($kamar) ? $kamar->harga_harian : '' }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="harga_harian">Harga Bulanan</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="harga_bulanan" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                    <input type="text" id="harga_bulanan" class="form-control"
                                                        placeholder="Masukkan harga bulanan (opsional)"
                                                        aria-describedby="basic-icon-default-company2"
                                                        value="{{ isset($kamar) ? $kamar->harga_bulanan : '' }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <select id="status" name="status" id="defaultSelect"
                                                    class="form-select">
                                                    <option value="laki-laki"
                                                        {{ isset($kamar) && $kamar->status == 'terisi' ? 'selected' : '' }}>
                                                        Terisi</option>
                                                    <option value="perempuan"
                                                        {{ isset($kamar) && $kamar->status == 'kosong' ? 'selected' : '' }}>
                                                        Kosong</option>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                                <button type="reset" class="btn btn-outline-secondary">Batalkan</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
