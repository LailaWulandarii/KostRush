@extends('layouts.main')
@section('title', 'Profil')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                                aria-selected="true">
                                <i class="tf-icons bx bx-user"></i> Profil
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile"
                                aria-selected="false">
                                <i class="tf-icons bx bx-lock-alt"></i> Ubah Kata Sandi
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                            <form id="formAccountSettings" method="POST"
                                action="{{ route('profil.update', ['id' => $user->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input class="form-control" type="text" id="name" name="name"
                                            value="{{ $user->name }}" autofocus />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input class="form-control" type="email" name="email" id="email"
                                            value=" {{ $user->email }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            value=" {{ $user->alamat }}" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control"
                                                value=" {{ $user->tgl_lahir }}" />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="no_hp" class="form-label">No Hp</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                                            value=" {{ $user->no_hp }}" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <input class="form-control" type="text" id="jenis_kelamin" name="jenis_kelamin"
                                            value=" {{ $user->jenis_kelamin === 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}"
                                            readonly />
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                    <button type="reset" class="btn btn-outline-secondary">Batalkan</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                            <form id="formAccountSettings" method="POST"
                                action="{{ route('profil.update', ['id' => $user->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-password-toggle mb-3 col-md-6">
                                        <label class="form-label" for="password">Kata Sandi Baru</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Masukkan Kata Sandi Baru"
                                                aria-describedby="basic-default-password" />
                                            <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-password-toggle mb-3 col-md-6">
                                        <label class="form-label" for="password">Konfirmasi Kata Sandi Baru</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Masukkan Kata Sandi Baru"
                                                aria-describedby="basic-default-password" />
                                            <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                    <button type="reset" class="btn btn-outline-secondary">Batalkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
