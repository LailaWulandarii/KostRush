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
                                        <input name="status_kamar" class="form-check-input" type="radio"
                                            value="kosong" id="statusKosong" {{ old('status_kamar') }} />
                                        <label class="form-check-label" for="statusKosong">Kosong</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input name="status_kamar" class="form-check-input" type="radio"
                                            value="terisi" id="statusTerisi" {{ old('status_kamar') }} />
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
                                <label for="foto_kamar" class="form-label">Foto Kamar</label>
                                <input class="form-control" id="foto_kamar" name="foto_kamar" type="file"
                                    accept="image/*" onchange="previewImages(event)" />
                                <div style="display: flex; flex-wrap: nowrap; overflow-x: auto; gap: 10px; width:200px"
                                    id="image-preview"></div>
                                @error('foto_kamar')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-3">
                        <div class="col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary"
                                onclick="clearPreview()">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
