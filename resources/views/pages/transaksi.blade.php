@extends('layouts.main')
@section('title', 'Transaksi')
@section('content')
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header">Data Transaksi</h5>
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
                                @foreach ($transaksi as $trans)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->no_hp }}</td>
                                        <td>{{ $trans->status }}</td>
                                        <td>
                                            <a href="#" class="btn btn-icon btn-outline-primary" data-bs-toggle="modal"
                                                data-bs-target="#showTransaksiDetail">
                                                <span class="tf-icons bx bx-show"></span>
                                            </a>
                                            <a href="#" class="btn btn-icon btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#showUserDetail"
                                                onclick="editUser({{ $user->id }})">
                                                <span class="tf-icons bx bx-edit-alt"></span>
                                            </a>
                                            <a href="{{ url('users/' . $user->id . '/delete') }}"
                                                onclick="return confirm('Apakah kamu yakin akan menghapus data ini?')"
                                                class="btn btn-icon btn-outline-primary"><span
                                                    class="tf-icons bx bx-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 col-md-3">
                    <!-- Modal -->
                    <div class="modal fade" id="showTransaksiDetail" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalScrollableTitle">Detail Transaksi</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="GET"
                                        action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
                                        @csrf
                                        @if (isset($user))
                                            @method('GET')
                                        @endif
                                        <div class="row">
                                            <h5>Data Diri</h5>
                                            <div class="mb-3 col-md-6">
                                                <label for="name" class="form-label">Nama Lengkap</label>
                                                <input class="form-control" type="text" id="name" name="name"
                                                    value="{{ $user->name }}" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" type="email" name="email" id="email"
                                                    value=" {{ $user->email }}" readonly />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat"
                                                    value=" {{ $user->alamat }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="tgl_lahir" name="tgl_lahir"
                                                        class="form-control" value=" {{ $user->tgl_lahir }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="no_hp" class="form-label">No Hp</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                    value=" {{ $user->no_hp }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <input class="form-control" type="text" id="jenis_kelamin"
                                                    name="jenis_kelamin" value=" {{ $user->jenis_kelamin }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h5>Review Pemesanan</h5>
                                            <div class="mb-3 col-md-6">
                                                <label for="name" class="form-label">Nama Kamar</label>
                                                <input class="form-control" type="text" id="name" name="name"
                                                    value="{{ $user->name }}" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" type="email" name="email" id="email"
                                                    value=" {{ $user->email }}" readonly />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="alamat" class="form-label">Tanggal Masuk</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat"
                                                    value=" {{ $user->alamat }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="tgl_lahir">Tanggal Keluar</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="tgl_lahir" name="tgl_lahir"
                                                        class="form-control" value=" {{ $user->tgl_lahir }}" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="no_hp" class="form-label">Metode Pembayaran</label>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $user->no_hp }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-icon btn-outline-primary" data-bs-toggle="modal" data-bs-target="#showTransaksiDetail">
                                                        <span class="tf-icons bx bx-show"></span>
                                                    </a>
                                                    <a href="#" class="btn btn-icon btn-outline-primary" data-bs-toggle="modal" data-bs-target="#showTransaksiDetail">
                                                        <span class="tf-icons bx bx-show"></span>
                                                    </a>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
