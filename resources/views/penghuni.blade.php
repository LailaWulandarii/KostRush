@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header">Data Penghuni</h5>
                <div class="table-responsive text-nowrap">
                    <a href="{{ route('pages.create_penghuni') }}" class="btn btn-primary" style="margin-left: 20px;">
                        <span class="tf-icons bx bx-user-plus"></span>&nbsp; Tambah Penghuni
                    </a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->no_hp }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $d->id) }}" class="btn btn-icon btn-outline-primary">
                                            <span class="tf-icons bx bx-edit-alt"></span>
                                        </a>                                        
                                        <a href="{{ route('users.edit', $d->id) }}"
                                            class="btn btn-icon btn-outline-primary">
                                            <span class="tf-icons bx bx-edit-alt"></span>
                                        </a>
                                        <a href="{{ url('users/' . $d->id . '/delete') }}"
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
        </div>
    </div>
@endsection
