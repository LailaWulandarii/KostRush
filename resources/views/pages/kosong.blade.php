@foreach ($kamars as $kamar)
<div class="kamar">
    <img src="{{ url('storage/foto_kamar/' . $kamar->id . '.jpg') }}" alt="Foto Kamar {{ $kamar->nama }}">
    @foreach($kamars as $kamar)
    <!-- Tampilkan gambar kamar -->
    <img src="{{ $fotoKamar[$kamar->id] }}" alt="Foto Kamar {{ $kamar->nama }}">
@endforeach    {{-- <p>{{ $kamar->deskripsi }}</p> --}}
    {{-- <span>Rp{{ number_format($kamar->harga, 0, ',', '.') }}</span> --}}
</div>
@endforeach