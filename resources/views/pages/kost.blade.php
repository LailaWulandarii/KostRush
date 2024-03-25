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
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                @foreach ($data as $d)
                                    <h5 class="card-title">{{ $d->nama_kost }}</h5>
                                    <form>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-icon-default-company">Fasilitas</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                    <textarea id="exampleFormControlTextarea1" class="form-control" aria-describedby="basic-icon-default-fullname2"
                                                        rows="2" readonly>{{ $d->fasilitas_kost }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-icon-default-company">Peraturan</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                    <textarea id="exampleFormControlTextarea1" class="form-control" aria-describedby="basic-icon-default-fullname2"
                                                        rows="2" readonly>{{ $d->peraturan_kost }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-icon-default-fullname">Alamat</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="bx bx-user"></i></span>
                                                    <textarea id="exampleFormControlTextarea1" class="form-control" aria-describedby="basic-icon-default-fullname2"
                                                        rows="2" readonly>{{ $d->alamat }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-icon-default-company">Rekening</label>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="basic-icon-default-company"
                                                        class="form-control" aria-describedby="basic-icon-default-company2"
                                                        value="{{ $d->jenis_bank }}" readonly />
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="basic-icon-default-company"
                                                        class="form-control"
                                                        aria-describedby="basic-icon-default-company2"
                                                        value="{{ $d->no_rek }}" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Atas
                                                Nama</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                    <input type="text" id="basic-icon-default-company"
                                                        class="form-control"
                                                        aria-describedby="basic-icon-default-company2"
                                                        value="{{ $d->nama_rek }}" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </div> --}}
                                    </form>
                                @endforeach

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
