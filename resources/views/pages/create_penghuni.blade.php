@extends('layouts.main')
@section('content')
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">{{ isset($user) ? 'Edit' : 'Tambah' }} Penghuni</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
                            @csrf
                            @if (isset($user))
                                @method('PUT')
                            @endif
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for=name">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan nama lengkap sesuai KTP"
                                            aria-describedby="basic-icon-default-fullname2"
                                            value="{{ isset($user) ? $user->name : '' }}" />
                                    </div>
                                </div>
                                {{-- @error('email')
                                <small>{{$message}}</small>
                                @enderror --}}
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="alamat">Alamat</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-message2" class="input-group-text"><i
                                                class="bx bx-buildings"></i></span>
                                        <textarea id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat sesuai KTP"
                                            aria-describedby="basic-icon-default-message2">{{ isset($user) ? $user->alamat : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tangal Lahir</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" id="tgl_lahir" name="tgl_lahir"
                                        value="{{ isset($user) ? $user->tgl_lahir : '' }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="no_hp">Nomor Hp</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                class="bx bx-phone"></i></span>
                                        <input type="text" id="no_hp" name="no_hp" class="form-control phone-mask"
                                            aria-describedby="basic-icon-default-phone2"
                                            value="{{ isset($user) ? $user->no_hp : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis
                                    Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <select id="jenis_kelamin" name="jenis_kelamin" id="defaultSelect"
                                            class="form-select">
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="laki-laki"
                                                {{ isset($user) && $user->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="perempuan"
                                                {{ isset($user) && $user->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="email">Email</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                        <input type="text" id="email" name="email" class="form-control"
                                            placeholder="Masukkan alamat emailmu"
                                            aria-describedby="basic-icon-default-email2"
                                            value="{{ isset($user) ? $user->email : '' }}" />
                                        <span id="basic-icon-default-email2" class="input-group-text">@gmail.com</span>
                                    </div>
                                    {{-- <div class="form-text">You can use letters, numbers & periods</div> --}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="password">Kata Sandi</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-lock"></i></span>
                                        <input type="text" id="password" name="password" class="form-control"
                                            placeholder="Masukkan kata sandimu"
                                            aria-describedby="basic-icon-default-email2" />
                                    </div>
                                </div>
                            </div>
                            <!-- Tambahkan input lainnya -->
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($user) ? 'Update' : 'Tambah' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
