@extends('layouts.main')
@section('title', 'Data Penghuni')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header">Data Penghuni</h5>
                <div class="table-responsive text-nowrap">
                    <a href="{{ route('pages.create-penghuni') }}" class="btn btn-primary" style="margin-left: 20px;">
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
                            @foreach ($penghuni as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->no_hp }}</td>
                                    <td>
                                        <a href="#" class="btn btn-icon btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#showUserDetail">
                                            <span class="tf-icons bx bx-show"></span>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-outline-primary" data-bs-toggle="modal" data-bs-target="#showUserDetail" onclick="editUser({{ $user->id }})">
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
            <div class="col-lg-4 col-md-3">
                <!-- Modal -->
                <div class="modal fade" id="showUserDetail" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalScrollableTitle">Detail Penghuni</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST"
                                    action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
                                    @csrf
                                    @if (isset($user))
                                        @method('PUT')
                                    @endif
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for=name">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Masukkan nama lengkap sesuai KTP"
                                                    aria-describedby="basic-icon-default-fullname2"
                                                    value="{{ isset($user) ? $user->name : '' }}" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 form-label" for="alamat">Alamat</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-message2" class="input-group-text"><i
                                                        class="bx bx-buildings"></i></span>
                                                <textarea id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat sesuai KTP"
                                                    aria-describedby="basic-icon-default-message2" readonly >{{ isset($user) ? $user->alamat : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tangal Lahir</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="date" id="tgl_lahir" name="tgl_lahir" readonly
                                                value="{{ isset($user) ? $user->tgl_lahir : '' }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 form-label" for="no_hp">Nomor Hp</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                        class="bx bx-phone"></i></span>
                                                <input type="text" id="no_hp" name="no_hp"
                                                    class="form-control phone-mask"
                                                    aria-describedby="basic-icon-default-phone2" readonly 
                                                    value="{{ isset($user) ? $user->no_hp : '' }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis
                                            Kelamin</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <select id="jenis_kelamin" name="jenis_kelamin" id="defaultSelect"
                                                    class="form-select" disabled >
                                                    <option>Pilih Jenis Kelamin</option>
                                                    <option readonly value="laki-laki"
                                                        {{ isset($user) && $user->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option readonly value="perempuan"
                                                        {{ isset($user) && $user->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                <input type="text" id="email" name="email" class="form-control"
                                                    placeholder="Masukkan alamat emailmu"
                                                    aria-describedby="basic-icon-default-email2" readonly 
                                                    value="{{ isset($user) ? $user->email : '' }}" />
                                                <span id="basic-icon-default-email2"
                                                    class="input-group-text">@gmail.com</span>
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
@endsection
<script>
    function showUserDetail(name, email) {
        // Atur nilai detail pengguna di modal
        document.getElementById('namaPengguna').textContent = name;
        document.getElementById('emailPengguna').textContent = email;
    }
</script>
