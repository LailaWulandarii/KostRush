@extends('main')
@section('content')
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header">Data Penghuni</h5>
                <div class="table-responsive text-nowrap">
                    <button type="button" class="btn btn-primary" style="margin-left: 20px;">
                        <span class="tf-icons bx bx-user-plus"></span>&nbsp; Tambah Penghuni
                    </button>
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
