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
                                    <div class="card-body">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">{{ $kamar->nama_kamar }}</h5>
                                            @if ($kamar->status_kamar == 'terisi')
                                                <a class="badge bg-label-danger">Terisi</a>
                                            @else
                                                <a class="badge bg-label-success">Kosong</a>
                                            @endif
                                        </div>
                                        <div class="d-flex "
                                            style="display: flex; justify-content: space-around; ">
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
                    <div class="mt-3 d-flex justify-content-center align-items-center flex-column">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('/asset/img/error.png') }}" alt="page-misc-error-light" width="400"
                                class="img-fluid mb-2" data-app-dark-img="illustrations/page-misc-error-dark.png"
                                data-app-light-img="illustrations/page-misc-error-light.png" />
                            <h5 class="mt-2">Oops! data kamarmu tidak ditemukan, harap tambahkan kamar terlebih dahulu.
                            </h5>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#createKamar"
                                class="btn btn-primary mb-2">Tambah kamar</a>
                        </div>
                    </div>
            @endif
        </div>
    </div>
    @include('layouts.modalCreateKamar')
    @include('layouts.modalKamar')
@endsection
<script>
    function previewImages(event) {
        var previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = '';

        var files = event.target.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                var image = document.createElement('img');
                image.src = e.target.result;
                image.style.maxWidth = '100%';
                image.style.height = 'auto';
                image.style.marginRight = '10px';

                previewContainer.appendChild(image);
            }

            reader.readAsDataURL(file);
        }
    }

    function clearPreview() {
        var previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = ''; // Menghapus semua elemen di dalamnya
    }
</script>
