<!-- MODAL CREATE -->
<div class="modal fade" id="createKamar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle">Tambah Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('kamar.store') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-8">
                            <label class="form-label" for="nama_kamar">Nama Kamar</label>
                            <div class="input-group input-group-merge">
                                <span id="nama_kamar" class="input-group-text"><i class="bx bx-bed"></i></span>
                                <input type="text" class="form-control" id="nama_kamar" name="nama_kamar"
                                    aria-describedby="basic-icon-default-fullname2" placeholder="Masukkan nama kamar"
                                    value="{{ old('nama_kamar') }}" />
                            </div>
                            @error('nama_kamar')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Status</label>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input name="status_kamar" class="form-check-input" type="radio" value="kosong"
                                            id="statusKosong" {{ old('status_kamar') }} />
                                        <label class="form-check-label" for="statusKosong">Kosong</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input name="status_kamar" class="form-check-input" type="radio" value="terisi"
                                            id="statusTerisi" {{ old('status_kamar') }} />
                                        <label class="form-check-label" for="statusTerisi">Terisi</label>
                                    </div>
                                </div>
                            </div>
                            @error('status_kamar')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label" for="fasilitas">Fasilitas
                                        Kamar</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-building"></i></span>
                                        <textarea id="fasilitas" placeholder="Deskripsikan fasilitas kamar" class="form-control" rows="2"
                                            name="fasilitas">{{ old('fasilitas') }}</textarea>
                                    </div>
                                    @error('fasilitas')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="harga">Harga Bulanan</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-wallet"></i></span>
                                        <input type="number" class="form-control" id="harga" name="harga"
                                            placeholder="Masukkan harga" value="{{ old('harga') }}" />
                                    </div>
                                    @error('harga')
                                        <small>{{ $message }}</small>
                                    @enderror
                                    <small style="color: gray">*Masukkan dalam format angka</small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="foto_kamar" class="form-label">Default file input example</label>
                                <input class="form-control" id="foto_kamar" name="foto_kamar" type="file" accept="image/*"/>
                                {{-- @error('foto_kamar')
                                <small>{{ $message }}</small>
                            @enderror --}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-3">
                        <div class="col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- 

@foreach ($kamars as $k)
    <!-- MODAL HAPUS -->
    <div class="modal fade" id="hapusKamar{{ $k->id_kamar }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Hapus Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('kamar/' . $k->id_kamar) }}">
                        @method('DELETE')
                        @csrf
                        <div class="row mb-3">
                            <p>Apakah kamu yakin akan menghapus {{ $k->nama_kamar }} dari data kamar?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL SHOW -->
    <div class="modal fade" id="showKamar{{ $k->id_kamar }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle">Detail Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="GET" action="{{ url('kamar/' . $k->id_kamar) }}">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label class="form-label" for="nama_kamar">Nama Kamar</label>
                                <div class="input-group input-group-merge">
                                    <span id="name" class="input-group-text"><i class="bx bx-bed"></i></span>
                                    <input type="text" class="form-control" id="nama_kamar" name="nama_kamar"
                                        aria-describedby="basic-icon-default-fullname2" readonly
                                        value="{{ old('nama_kamar', $k->nama_kamar) }}" />
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Status</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input name="status" class="form-check-input" type="radio"
                                                value="kosong" id="statusKosong" readonly disabled
                                                {{ old('status', $k->status) === 'kosong' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="statusKosong">Kosong</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input name="status" class="form-check-input" type="radio"
                                                value="terisi" id="statusTerisi" readonly disabled
                                                {{ old('status', $k->status) === 'terisi' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="statusTerisi">Terisi</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="fasilitas_kamar">Fasilitas
                                            Kamar</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-building"></i></span>
                                            <textarea id="fasilitas_kamar" class="form-control" rows="2" name="fasilitas_kamar" readonly>{{ old('fasilitas_kamar', $kamar->fasilitas_kamar) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="harga">Harga Bulanan</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-wallet"></i></span>
                                            <input type="number" class="form-control" id="harga" name="harga"
                                                value="{{ old('harga', $k->harga) }}" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL UPDATE -->
    <div class="modal fade" id="updateKamar{{ $k->id_kamar }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle">Edit Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('kamar/' . $k->id_kamar) }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label class="form-label" for="nama_kamar">Nama Kamar</label>
                                <div class="input-group input-group-merge">
                                    <span id="name" class="input-group-text"><i class="bx bx-bed"></i></span>
                                    <input type="text" class="form-control" id="nama_kamar" name="nama_kamar"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ old('nama_kamar', $k->nama_kamar) }}" />
                                </div>
                                @error('nama_kamar')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Status</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input name="status" class="form-check-input" type="radio"
                                                value="kosong" id="statusKosong"
                                                {{ old('status', $k->status) === 'kosong' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="statusKosong">Kosong</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input name="status" class="form-check-input" type="radio"
                                                value="terisi" id="statusTerisi"
                                                {{ old('status', $k->status) === 'terisi' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="statusTerisi">Terisi</label>
                                        </div>
                                    </div>
                                </div>
                                @error('status')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="fasilitas_kamar">Fasilitas
                                            Kamar</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-building"></i></span>
                                            <textarea id="fasilitas_kamar" class="form-control" rows="2" name="fasilitas_kamar">{{ old('fasilitas_kamar', $kamar->fasilitas_kamar) }}</textarea>
                                        </div>
                                        @error('fasilitas_kamar')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="harga">Harga Bulanan</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-wallet"></i></span>
                                            <input type="number" class="form-control" id="harga" name="harga"
                                                value="{{ old('harga', $k->harga) }}" />
                                        </div>
                                        @error('harga')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <small style="color: gray">*Masukkan dalam format angka</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col-sm-12 text-end">
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach --}}
