<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PenghuniController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $penghuni = User::where('role', 'penyewa')
            ->where('id_kost', $user->id_kost)
            ->with('penghuniKamar', 'transaksis')
            ->get();

        return view('pages.penghuni', compact('penghuni'));
    }
}
