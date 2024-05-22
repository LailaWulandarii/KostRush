@extends('layouts.main')
@section('title', 'Beranda')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar flex-shrink-0 me-3" style="width: 60px; height: 60px;">
                                    <span class="avatar-initial rounded bg-label-primary"
                                        style="display: flex; align-items: center; justify-content: center; 
                                        width: 100%; height: 100%;">
                                        <i class="bx bxs-bed" style="font-size: 2em;"></i>
                                    </span>
                                </div>
                                <div>
                                    <span class="fw-semibold d-block mb-1" style="font-size: 1.5em">Kamar Kosong</span>
                                    <span class="fw-semibold d-block mb-1 h4">{{ $jumlahKamarKosong }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar flex-shrink-0 me-3" style="width: 60px; height: 60px;">
                                    <span class="avatar-initial rounded bg-label-primary"
                                        style="display: flex; align-items: center; justify-content: center;
                                        width: 100%; height: 100%;">
                                        <i class="bx bxs-user-voice" style="font-size: 2em;"></i>
                                    </span>
                                </div>
                                <div>
                                    <span class="fw-semibold d-block mb-1" style="font-size: 1.5em">Penghuni aktif</span>
                                    <span class="fw-semibold d-block mb-1 h4">{{ $penyewas }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 mb-3">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <span class="fw-semibold d-block mb-4" style="font-size: 1.25em">Statistik Kamar</span>
                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                @foreach ($kamars->sortByDesc('jumlah_sewa')->take(5) as $kamar)
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class="bx bx-home-alt"></i></span>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">{{ $kamar->nama_kamar }}</h6>
                                                <small class="text-muted">Harga: {{ $kamar->harga }}</small>
                                            </div>
                                            <div class="user-progress">
                                                <small class="fw-semibold">Jumlah Sewa: {{ $kamar->jumlah_sewa }}</small>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto col-12 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <span class="fw-semibold d-block " style="font-size: 1.25em">Transaksi Baru</span>
                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                @foreach ($transaksis as $transaksi)
                                    <li class="d-flex mb-4 pb-1">
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <a href="{{ route('transaksi.baru') }}">
                                                <div class="me-2">
                                                    <h5 class="mb-1">{{ $transaksi->user->name }}</h5>
                                                    <h6 class="mb-0">{{ $transaksi->kamar->nama_kamar }}</h6>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
