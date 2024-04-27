@extends('layouts.main')
@section('title', 'Data Kost')
@section('content')
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-md">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                                    <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                                    <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset('/asset/img/elements/13.jpg') }}"
                                            alt="First slide" />
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>First slide</h3>
                                            <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/asset/img/elements/2.jpg') }}"
                                            alt="Second slide" />
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Second slide</h3>
                                            <p>In numquam omittam sea.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('/asset/img/elements/18.jpg') }}"
                                            alt="Third slide" />
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Third slide</h3>
                                            <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExample" role="button"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExample" role="button"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                            <div class="text-center mb-3 mt-3">
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit Foto
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <form method="POST" action="{{ route('kost.store') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Nama
                                            Kost</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                                <input type="text" id="nama_kost" class="form-control" name="nama_kost"
                                                    value="{{ old('nama_kost') }}" />
                                            </div>
                                            @error('nama_kost')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tipe Kost</label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input name="tipe" class="form-check-input" type="radio"
                                                        value="putra" id="statusPutra" 
                                                        {{ old('tipe') === 'putra' ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="statusPutra">Putra</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-check">
                                                    <input name="tipe" class="form-check-input" type="radio"
                                                        value="putri" id="statusPutri" 
                                                        {{ old('tipe') === 'putri' ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="statusPutri">Putri</label>
                                                </div>
                                            </div><div class="col">
                                                <div class="form-check">
                                                    <input name="tipe" class="form-check-input" type="radio"
                                                        value="campur" id="statusCampur" 
                                                        {{ old('tipe') === 'campur' ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="statusCampur">Campur</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-icon-default-company">Fasilitas</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bx bx-building"></i></span>
                                                <textarea class="form-control" type="text" id="fasilitas" name="fasilitas" rows="3"
                                                    style="text-align: justify">{{ old('fasilitas') }}
                                                </textarea>
                                            </div>
                                            @error('fasilitas')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-icon-default-company">Peraturan</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bx bx-error-alt"></i></span>
                                                <textarea class="form-control" type="text" id="peraturan" name="peraturan" rows="2"
                                                    style="text-align: justify">{{ old('peraturan') }}
                                                </textarea>
                                            </div>
                                            @error('peraturan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-icon-default-fullname">Alamat</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bx bx-map"></i></span>
                                                <textarea class="form-control" type="text" id="alamat" name="alamat" rows="2"
                                                    style="text-align: justify">{{ old('alamat') }}</textarea>
                                            </div>
                                        </div>
                                        @error('alamat')
                                            <small>{{ $message }}</small>
                                        @enderror
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
