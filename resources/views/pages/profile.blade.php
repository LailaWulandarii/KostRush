@extends('layouts.main')
@section('title', 'Profil')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header"> Detail Profil</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST"
                            action="{{ route('profil.update', ['id' => $user->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ $user->name }}" autofocus />
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                                    @error('alamat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                        value="{{ old('tgl_lahir', $user->tgl_lahir) }}" />
                                    @error('tgl_lahir')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="no_hp" class="form-label">No Hp</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value=" {{ $user->no_hp }}" />
                                    @error('no_hp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-md-6 col-form-label">Jenis Kelamin</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <input name="jenis_kelamin" class="form-check-input" type="radio"
                                                    value="laki-laki" id="jenisKelaminLaki"
                                                    {{ old('jenis_kelamin', $user->jenis_kelamin) === 'laki-laki' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="jenisKelaminLaki">Laki-laki</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input name="jenis_kelamin" class="form-check-input" type="radio"
                                                    value="perempuan" id="jenisKelaminPerempuan"
                                                    {{ old('jenis_kelamin', $user->jenis_kelamin) === 'perempuan' ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="jenisKelaminPerempuan">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('jenis_kelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2 text-end">
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
                <div class="card">
                    <h5 class="card-header">Ubah Kata Sandi</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                        </div>
                        <form method="POST" action="{{ route('profil.change.password') }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="new_password" class="form-label">Kata Sandi Baru</label>
                                    <input class="form-control" type="password" name="new_password" id="new_password"
                                        placeholder="Masukkan Kata Sandi Barumu" />
                                    @error('new_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="new_password_confirmation" class="form-label">Konfirmasi Kata
                                        Sandi</label>
                                    <input class="form-control" type="password" name="new_password_confirmation"
                                        id="new_password_confirmation"
                                        placeholder="Masukkan Konfirmasi Kata Sandi Barumu" />
                                    @error('new_password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2 text-end">
                                <button type="submit" class="btn btn-primary me-2">Ubah Kata Sandi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
