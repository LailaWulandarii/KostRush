            <!-- MODAL TAMBAH -->
            <div class="modal fade" id="createPenghuni" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalScrollableTitle">Tambah Penghuni</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ url('penghuni') }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="name">Nama Lengkap</label>
                                        <div class="input-group input-group-merge">
                                            <span id="name" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Masukkan Nama Lengkap Sesuai KTP"
                                                aria-describedby="basic-icon-default-fullname2"
                                                value="{{ old('name') }}" />
                                        </div>
                                        @error('name')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="no_hp">No. HP</label>
                                        <div class="input-group input-group-merge">
                                            <span id="no_hp" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input type="number" class="form-control" id="no_hp" name="no_hp"
                                                placeholder="Masukkan No HP Aktif"
                                                aria-describedby="basic-icon-default-fullname2"
                                                value="{{ old('no_hp') }}" />
                                        </div>
                                        @error('no_hp')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="email">E-Mail</label>
                                        <div class="input-group input-group-merge">
                                            <span id="email" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Masukkan Email yang Valid"
                                                aria-describedby="basic-icon-default-fullname2"
                                                value="{{ old('email') }}" />
                                        </div>
                                        @error('email')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <div class="input-group input-group-merge">
                                            <span id="alamat" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Masukkan alamat yang Valid"
                                                aria-describedby="basic-icon-default-fullname2"
                                                value="{{ old('alamat') }}" />
                                        </div>
                                        @error('alamat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-3 col-md-6">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" for="alamat" name="alamat" placeholder="Masukkan Alamat Sesuai KTP"
                                            rows="3"></textarea>
                                        @error('alamat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div> --}}
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="pekerjaan">Pekerjaan</label>
                                        <div class="input-group input-group-merge">
                                            <span id="pekerjaan" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                                placeholder="Masukkan pekerjaanmu"
                                                aria-describedby="basic-icon-default-fullname2"
                                                value="{{ old('pekerjaan') }}" />
                                        </div>
                                        @error('pekerjaan')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin"
                                            aria-label="Default select example">
                                            <option value="" {{ old('jenis_kelamin') == '' ? 'selected' : '' }}>
                                                Pilih Jenis Kelamin</option>
                                            <option value="laki-laki"
                                                {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="perempuan"
                                                {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                        <div class="input-group input-group-merge">
                                            <span id="tgl_lahir" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input type="date" class="form-control" id="tgl_lahir"
                                                name="tgl_lahir" placeholder="Masukkan Tanggal Lahirmu"
                                                aria-describedby="basic-icon-default-fullname2"
                                                value="{{ old('tgl_lahir') }}" />
                                        </div>
                                        @error('tgl_lahir')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                        <div class="input-group input-group-merge">
                                            <span id="tgl_lahir" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input type="date" class="form-control" id="tgl_lahir"
                                                name="tgl_lahir" placeholder="Masukkan Tanggal Lahirmu"
                                                aria-describedby="basic-icon-default-fullname2"
                                                value="{{ old('tgl_lahir') }}" />
                                        </div>
                                        @error('tgl_lahir')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-3 col-md-6">
                                        <label for="html5-datetime-local-input"
                                            class="col-md-6 col-form-label">Tanggal Masuk</label>
                                        <div class="mb-3 ">
                                            <input class="form-control" type="datetime-local"
                                                value="2021-06-18T12:30:00" id="html5-datetime-local-input"
                                                value="{{ old('') }}" />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="html5-datetime-local-input"
                                            class="col-md-6 col-form-label">Tanggal Keluar</label>
                                        <div class="mb-3 ">
                                            <input class="form-control" type="datetime-local"
                                                value="2021-06-18T12:30:00"
                                                id="html5-datetime-local-input"value="{{ old('') }}" />
                                        </div>
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Foto KTP</label>
                                        <input class="form-control" type="file" id="formFile" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                <button type="reset" class="btn btn-outline-secondary">Batalkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($penghuni as $p)
                <!-- MODAL HAPUS -->
                <div class="modal fade" id="hapusPenghuni{{ $p->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Hapus Penghuni</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('penghuni/' . $p->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <div class="row mb-3">
                                        <p>Apakah kamu yakin akan menghapus data {{ $p->name }}?</p>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL UPDATE -->
                <div class="modal fade" id="updatePenghuni{{ $p->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalScrollableTitle">Edit Penghuni</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('penghuni/' . $p->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="name">Nama Lengkap</label>
                                            <div class="input-group input-group-merge">
                                                <span id="name" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" id="name"
                                                    name="name" placeholder="Masukkan Nama Lengkap Sesuai KTP"
                                                    aria-describedby="basic-icon-default-fullname2"
                                                    value="{{ old('name', $p->name) }}" />
                                            </div>
                                            @error('name')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="no_hp">No. HP</label>
                                            <div class="input-group input-group-merge">
                                                <span id="no_hp" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                <input type="number" class="form-control" id="no_hp"
                                                    name="no_hp" placeholder="Masukkan No HP Aktif"
                                                    aria-describedby="basic-icon-default-fullname2"
                                                    value="{{ old('no_hp', $p->no_hp) }}" />
                                            </div>
                                            @error('no_hp')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="email">E-Mail</label>
                                            <div class="input-group input-group-merge">
                                                <span id="email" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" id="email"
                                                    name="email" placeholder="Masukkan Email yang Valid"
                                                    aria-describedby="basic-icon-default-fullname2"
                                                    value="{{ old('email', $p->email) }}" />
                                            </div>
                                            @error('email')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="alamat">Alamat</label>
                                            <div class="input-group input-group-merge">
                                                <span id="alamat" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" id="alamat"
                                                    name="alamat" placeholder="Masukkan alamat yang Valid"
                                                    aria-describedby="basic-icon-default-fullname2"
                                                    value="{{ old('alamat', $p->alamat) }}" />
                                            </div>
                                            @error('alamat')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        {{-- <div class="mb-3 col-md-6">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat" for="alamat" name="alamat" placeholder="Masukkan Alamat Sesuai KTP"
                                                rows="3"></textarea>
                                            @error('alamat')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div> --}}
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="pekerjaan">Pekerjaan</label>
                                            <div class="input-group input-group-merge">
                                                <span id="pekerjaan" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" id="pekerjaan"
                                                    name="pekerjaan" placeholder="Masukkan pekerjaanmu"
                                                    aria-describedby="basic-icon-default-fullname2"
                                                    value="{{ old('pekerjaan', $p->pekerjaan) }}" />
                                            </div>
                                            @error('pekerjaan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin"
                                                aria-label="Default select example">
                                                <option value=""
                                                    {{ old('jenis_kelamin', $p->jenis_kelamin) == '' ? 'selected' : '' }}>
                                                    Pilih Jenis Kelamin</option>
                                                <option value="laki-laki"
                                                    {{ old('jenis_kelamin', $p->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option value="perempuan"
                                                    {{ old('jenis_kelamin', $p->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                            <div class="input-group input-group-merge">
                                                <span id="tgl_lahir" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                <input type="date" class="form-control" id="tgl_lahir"
                                                    name="tgl_lahir" placeholder="Masukkan Tanggal Lahirmu"
                                                    aria-describedby="basic-icon-default-fullname2"
                                                    value="{{ old('tgl_lahir', $p->tgl_lahir) }}" />
                                            </div>
                                            @error('tgl_lahir')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                            <div class="input-group input-group-merge">
                                                <span id="tgl_lahir" class="input-group-text"><i
                                                        class="bx bx-user"></i></span>
                                                <input type="date" class="form-control" id="tgl_lahir"
                                                    name="tgl_lahir" placeholder="Masukkan Tanggal Lahirmu"
                                                    aria-describedby="basic-icon-default-fullname2"
                                                    value="{{ old('tgl_lahir', $p->tgl_lahir) }}" />
                                            </div>
                                            @error('tgl_lahir')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="html5-datetime-local-input"
                                                class="col-md-6 col-form-label">Tanggal Masuk</label>
                                            <div class="mb-3 ">
                                                <input class="form-control" type="datetime-local"
                                                    id="html5-datetime-local-input" value="{{ old('') }}" />
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="html5-datetime-local-input"
                                                class="col-md-6 col-form-label">Tanggal Keluar</label>
                                            <div class="mb-3 ">
                                                <input class="form-control" type="datetime-local"
                                                    id="html5-datetime-local-input"value="{{ old('') }}" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Foto KTP</label>
                                            <input class="form-control" type="file" id="formFile" />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                    <button type="reset" class="btn btn-outline-secondary">Batalkan</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
