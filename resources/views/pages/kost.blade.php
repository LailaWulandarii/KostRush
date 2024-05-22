@extends('layouts.main')
@section('title', 'Data Kost')
@section('content')
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-md">
                <div class="card mb-3">
                    <div class="row g-0">
                        @if ($kost)
                            <div class="col-md-12 ">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('kost.update', ['kost' => $kost->id]) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8 mb-2">
                                                <label class="form-label" for="nama_kost">Nama Kost</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                                    <input type="text" id="nama_kost" class="form-control"
                                                        name="nama_kost" value="{{ old('nama_kost', $kost->nama_kost) }}" />
                                                </div>
                                                @error('nama_kost')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="tipe">Tipe Kost</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="tipe" class="form-control" name="tipe"
                                                        readonly value="{{ old('tipe', $kost->tipe) }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label" for="fasilitas">Fasilitas Kost</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-building"></i></span>
                                                <textarea id="fasilitas" class="form-control" rows="2" name="fasilitas">{{ old('fasilitas', $kost->fasilitas) }}</textarea>
                                            </div>
                                            @error('fasilitas')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label" for="peraturan">Peraturan Kost</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-error-alt"></i></span>
                                                <textarea id="peraturan" class="form-control" rows="2" name="peraturan">{{ old('peraturan', $kost->peraturan) }}</textarea>
                                            </div>
                                            @error('peraturan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label class="form-label" for="alamat">Alamat Kost</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-map"></i></span>
                                                        <textarea id="alamat" class="form-control" rows="2" name="alamat">{{ old('alamat', $kost->alamat) }}</textarea>
                                                    </div>
                                                </div>
                                                @error('alamat')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="kecamatan">Kecamatan</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="kecamatan" class="form-control"
                                                        name="kecamatan" readonly
                                                        value="{{ old('kecamatan', $kost->kecamatan) }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2 mt-4">
                                            <div class="col-sm-12 text-end">
                                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                                <button type="reset" class="btn btn-outline-secondary">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @if (!$kost)
                    <div class="mt-3 d-flex justify-content-center align-items-center flex-column">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('/asset/img/error.png') }}" alt="page-misc-error-light" width="400"
                                class="img-fluid mb-2" data-app-dark-img="illustrations/page-misc-error-dark.png"
                                data-app-light-img="illustrations/page-misc-error-light.png" />
                            <h5 class="mt-2">Oops! data kostmu tidak ditemukan, harap daftarkan kostmu terlebih dahulu.
                            </h5>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#createKost"
                                class="btn btn-primary mb-2">Daftar Kost</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('layouts.modalCreateKost')
@endsection
