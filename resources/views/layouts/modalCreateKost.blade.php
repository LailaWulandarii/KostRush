<!-- MODAL CREATE -->
<div class="modal fade" id="createKost" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle">Daftar Kost</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('kost.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 mb-2">
                            <label class="form-label" for="nama_kost">Nama Kost</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                <input type="text" id="nama_kost" class="form-control" name="nama_kost"
                                    value="{{ old('nama_kost') }}" />
                            </div>
                            @error('nama_kost')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="tipe">Tipe Kost</label>
                            <select id="tipe" class="form-select" name="tipe">
                                <option value="putra">Putra</option>
                                <option value="putri">Putri</option>
                                <option value="campur">Campur</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label" for="fasilitas">Fasilitas Kost</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-building"></i></span>
                            <textarea id="fasilitas" class="form-control" rows="2" name="fasilitas">{{ old('fasilitas') }}</textarea>
                        </div>
                        @error('fasilitas')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label" for="peraturan">Peraturan Kost</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-error-alt"></i></span>
                            <textarea id="peraturan" class="form-control" rows="2" name="peraturan">{{ old('peraturan') }}</textarea>
                        </div>
                        @error('peraturan')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label class="form-label" for="alamat">Alamat Kost</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-map"></i></span>
                                    <textarea id="alamat" class="form-control" rows="2" name="alamat">{{ old('alamat') }}</textarea>
                                </div>
                            </div>
                            @error('alamat')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="kecamatan">Kecamatan</label>
                            <select id="kecamatan" class="form-select" name="kecamatan">
                                <option value="Bagor">Bagor</option>
                                <option value="Baron">Baron</option>
                                <option value="Berbek">Berbek</option>
                                <option value="Gondang">Gondang</option>
                                <option value="Jatikalen">Jatikalen</option>
                                <option value="Kertosono">Kertosono</option>
                                <option value="Lengkong">Lengkong</option>
                                <option value="Loceret">Loceret</option>
                                <option value="Nganjuk">Nganjuk</option>
                                <option value="Ngetos">Ngetos</option>
                                <option value="Ngluyu">Ngluyu</option>
                                <option value="Ngronggot">Ngronggot</option>
                                <option value="Pace">Pace</option>
                                <option value="Patianrowo">Patianrowo</option>
                                <option value="Plemahan">Plemahan</option>
                                <option value="Prambon">Prambon</option>
                                <option value="Rejoso">Rejoso</option>
                                <option value="Sawahan">Sawahan</option>
                                <option value="Sukomoro">Sukomoro</option>
                                <option value="Tanjunganom">Tanjunganom</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2 mt-4">
                        <div class="col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
