<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kamar;

class KamarController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $kost = $user->kost;
        $kamars = $kost->kamars;

        foreach ($kamars as $kamar) {
            $transaksi = $kamar->transaksi()
                ->where('tanggal_keluar', '<', now())
                ->where('status_transaksi', 'selesai')
                ->get();

            foreach ($transaksi as $transaksi) {
                if ($kamar->status_kamar === 'terisi') {
                    $kamar->status_kamar = 'kosong';
                    $kamar->save();
                }
            }
        }

        return view('pages.kamar', compact('kamars'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ' Data harus diisi.',
            'min' => ' Data harus diisi minimal :min karakter.',
            'max' => ' Data harus diisi maksimal :max karakter.',
            'nama_kamar.regex' => ' Nama kamar hanya boleh berisi huruf, angka, dan spasi.',
            'fasilitas.regex' => ' Fasilitas kamar hanya boleh berisi huruf, 
            angka, spasi, titik, koma, dan tanda kurung.',
            'harga.numeric' => ' Harga harus berupa angka.',
            'status_kamar.in' => ' Status kamar harus berisi "kosong" atau "terisi".',
            'foto_kamar.required' => ' Foto kamar  wajib diisi.',
            'foto_kamar.image' => ' Foto kamar harus berupa file gambar.',
            'foto_kamar.mimes' => ' Foto kamar harus berupa file dengan format: jpeg, png, jpg, svg.',
            'foto_kamar.max' => ' Foto kamar harus kurang dari :max kilobita.',
        ];

        $request->validate([
            'nama_kamar' => 'required|string|min:5|max:20|regex:/^[a-zA-Z0-9\s\']+$/',
            'status_kamar' => 'required|in:kosong,terisi',
            'fasilitas' => 'required|string|min:5|max:70|regex:/^[a-zA-Z0-9\s\':.,\/!]+$/',
            'harga' => 'required|numeric|min:0',
            'foto_kamar' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ], $messages);
        $path = 'foto_kamar/';

        if ($request->hasFile('foto_kamar')) {
            $file = $request->file('foto_kamar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $file->move(public_path($path), $filename);
        }
        $user = Auth::user();
        $kamar = new Kamar();
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->status_kamar = $request->status_kamar;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->harga = $request->harga;
        $kamar->foto_kamar = $path . $filename;
        $kamar->id_kost = $user->kost->id;
        $kamar->save();
        return redirect()->back()->with('success', 'Kamar berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ' Data harus diisi.',
            'min' => ' Data harus diisi minimal :min karakter.',
            'max' => ' Data harus diisi maksimal :max karakter.',
            'nama_kamar.regex' => ' Nama kamar hanya boleh berisi huruf, angka, dan spasi.',
            'fasilitas.regex' => ' Fasilitas kamar hanya boleh berisi huruf, angka,
            spasi, titik, koma, dan tanda kurung.',
            'harga.numeric' => ' Harga harus berupa angka.',
            'status_kamar.in' => ' Status kamar harus berisi "kosong" atau "terisi".',
            'foto_kamar.required' => ' Foto kamar  wajib diisi.',
            'foto_kamar.image' => ' Foto kamar harus berupa file gambar.',
            'foto_kamar.mimes' => ' Foto kamar harus berupa file dengan format: jpeg, png, jpg, svg.',
            'foto_kamar.max' => ' Foto kamar harus kurang dari :max kilobita.',
        ];
        $request->validate([
            'nama_kamar' => 'required|string|min:5|max:20|regex:/^[a-zA-Z0-9\s\']+$/',
            'status_kamar' => 'required|in:kosong,terisi',
            'fasilitas' => 'required|string|min:5|max:70|regex:/^[a-zA-Z0-9\s\':.,\/!]+$/',
            'harga' => 'required|numeric|min:0',
            'foto_kamar' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ], $messages);
        $kamar = Kamar::findOrFail($id);

        if ($request->hasFile('foto_kamar')) {
            $path = 'foto_kamar/';
            $file = $request->file('foto_kamar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path($path), $filename);

            if (file_exists(public_path($kamar->foto_kamar))) {
                unlink(public_path($kamar->foto_kamar));
            }
            $kamar->foto_kamar = $path . $filename;
        }
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->harga = $request->harga;
        $kamar->status_kamar = $request->status_kamar;
        $kamar->save();
        return redirect()->back()->with('success', 'Data kamar berhasil diupdate.');
    }


    public function destroy(int $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->back()->with('status', 'data berhasil dihapus');
    }
}
