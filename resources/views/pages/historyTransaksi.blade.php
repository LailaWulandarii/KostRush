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
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($penyewa as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->no_hp }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                            <a href="{{ route('users.show', $user->id) }}"
                                                class="btn btn-icon btn-outline-primary">
                                                <span class="tf-icons bx bx-show"></span>
                                            </a>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-icon btn-outline-primary">
                                            <span class="tf-icons bx bx-edit-alt"></span>
                                        </a>
                                        <a href="{{ url('users/' . $user->id . '/delete') }}"
                                            onclick="return confirm('Apakah kamu yakin akan menghapus data ini?')"
                                            class="btn btn-icon btn-outline-primary"><span
                                                class="tf-icons bx bx-trash"></span></a>
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
