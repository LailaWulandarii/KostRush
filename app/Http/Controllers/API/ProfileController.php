<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Check if user is logged in
        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized. Please login to access profile data.',
            ], 401); // Unauthorized status code
        }

        $profileData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'alamat' => $user->alamat,
            'tgl_lahir' => $user->tgl_lahir,
            'no_hp' => $user->no_hp,
            'jenis_kelamin' => $user->jenis_kelamin,
        ];

        return response()->json([
            'message' => 'Profile data retrieved successfully.',
            'data' => $profileData,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $id = Auth::user()->id;
        // $user = User::findOrFail($id);

        // $rules = [
        //     'name' => ['required', 'string', 'min:5', 'max:70', 'regex:/^[a-zA-Z\s\']+$/'],
        //     'alamat' => ['required', 'string', 'min:15', 'max:50', 'regex:/^[a-zA-Z0-9\s\.,]+$/'],
        //     'pekerjaan' => ['required', 'string', 'min:5', 'max:20', 'regex:/^[a-zA-Z\s\']+$/'],
        //     'tgl_lahir' => ['required', 'date'],
        //     'no_hp' => ['required', 'string', 'min:9', 'max:13', 'regex:/^(08|\+62)\d{9,13}$/'],
        //     'jenis_kelamin' => ['required', Rule::in(['laki-laki', 'perempuan'])],
        //     'foto_profil' => ['required', 'string']
        // ];

        // $validatedData = $request->validate($rules);

        // $user->name = $validatedData['name'];
        // $user->pekerjaan = $validatedData['pekerjaan'];
        // $user->alamat = $validatedData['alamat'];
        // $user->tgl_lahir = $validatedData['tgl_lahir'];
        // $user->no_hp = $validatedData['no_hp'];
        // $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        // $user->foto_profil = $validatedData['foto_profil'];
        // $user->save();
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $rules = [
            'password' => ['required', 'string', 'min:6', 'max:12'],
        ];

        $validatedData = $request->validate($rules);

        if ($validatedData) {
            $user->password = $validatedData['password'];
            $user->save();
            $data = [
                "message" => "Password berhasil diubah"
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Password gagal diubah'
            ];
            return response()->json($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
