@extends('layouts.main')
@section('title', 'Data Kamar')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            @if ($kamars->isNotEmpty())
                <div class="table-responsive text-nowrap">
                    <a href="#" class="btn btn-primary" style="margin-left: 5px; margin-bottom: 20px;"
                        data-bs-toggle="modal" data-bs-target="#createKamar">
                        <span class="tf-icons bx bx-bed"></span>&nbsp; Tambah Kamar
                    </a>
                    <div class="row mb-5">
                        @foreach ($kamars as $kamar)
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
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
                                                    <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue
                                                        pertinacia.
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
                                                    <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco
                                                        mel
                                                        no.
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
                                    <!-- Menambahkan perulangan foreach untuk foto-foto kamar -->
                                    {{-- @foreach ($kamar->fotoKamar as $foto)
                                    <img class="card-img-top" src="{{ $foto->url }}" alt="Card image cap" />
                                @endforeach --}}
                                    <div class="card-body">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">{{ $kamar->nama_kamar }}</h5>
                                            @if ($kamar->status_kamar == 'terisi')
                                                <a class="badge bg-label-danger">Terisi</a>
                                            @else
                                                <a class="badge bg-label-success">Kosong</a>
                                            @endif
                                        </div>
                                        <div class="d-flex " style="display: flex; justify-content: space-around; ">
                                            <button type="button"
                                                class="btn btn-icon btn-outline-primary tf-icons bx bx-show mx-1"
                                                data-bs-toggle="modal" style="width: 42px"
                                                data-bs-target="#showKamar{{ $kamar->id_kamar }}"></button>
                                            <button type="button"
                                                class="btn btn-icon btn-outline-primary tf-icons bx bx-edit-alt mx-1"
                                                data-bs-toggle="modal" style="width: 42px"
                                                data-bs-target="#updateKamar{{ $kamar->id_kamar }}"></button>
                                            <button type="button"
                                                class="btn btn-icon btn-outline-primary tf-icons bx bx-trash mx-1"
                                                style="width: 42px" data-bs-toggle="modal"
                                                data-bs-target="#hapusKamar{{ $kamar->id_kamar }}">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    Tidak ada data kamar yang tersedia saat ini.
            @endif
        </div>
    </div>
    @include('layouts.modalCreateKamar')
    @include('layouts.modalKamar')
@endsection
