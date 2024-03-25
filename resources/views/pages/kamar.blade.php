@extends('layouts.main')
@section('title', 'Data Kamar')
@section('content')
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header">Data Kamar</h5>
                <div class="table-responsive text-nowrap">
                    <button type="button" class="btn btn-primary" style="margin-left: 20px;">
                        <span class="tf-icons bx bx-user-plus"></span>&nbsp; Tambah Kamar
                    </button>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Kamar</th>
                                <th>Fasilitas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($kamars as $kamar)
                                <tr>
                                    <td>{{ $kamar->nama_kamar }}</td>
                                    <td>{{ $kamar->fasilitas_kamar }}</td>
                                    <td>{{ $kamar->status }}</td>
                                    <td>
                                        <button type="button" class="btn btn-icon btn-outline-primary">
                                            <span class="tf-icons bx bx-edit-alt "></span>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-outline-primary">
                                            <span class="tf-icons bx bx-trash "></span>
                                        </button>
                </div>
            </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    <!--/ Hoverable Table rows -->
    <!-- / Content -->

    </div>

    </div>
@endsection
