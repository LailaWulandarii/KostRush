@extends('layouts.main')
@section('title', 'Riwayat Transaksi')
@section('content')
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header">Data Transaksi</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Kamar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($penyewa as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->no_hp }}</td>
                                    <td>{{ $data->kamar }}</td>
                                    <td>{{ $data->status }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
