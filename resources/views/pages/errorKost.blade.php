@extends('layouts.main')
@section('title', 'Data Kost')
@section('content')
<div class="mt-3 d-flex justify-content-center align-items-center flex-column">
    <div class="d-flex flex-column align-items-center">
        <img src="{{ asset('/asset/img/error.png') }}" alt="page-misc-error-light" width="400"
            class="img-fluid mb-2" data-app-dark-img="illustrations/page-misc-error-dark.png"
            data-app-light-img="illustrations/page-misc-error-light.png" />
            <h5 class="mt-2">Oops! data kostmu tidak ditemukan, harap daftarkan kostmu terlebih dahulu.</h5>
        <a href="{{ route('kost.create') }}" class="btn btn-primary mb-2">Daftar Kost</a>
    </div>
</div>
@endsection