<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfilController extends Controller
{

    public function index(Request $request)
    {
        // Get the currently logged-in user using Auth facade
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
    

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $rules = [
            'name' => ['required', 'string', 'min:5', 'max:70', 'regex:/^[a-zA-Z\s\']+$/'],
            'alamat' => ['required', 'string', 'min:15', 'max:50', 'regex:/^[a-zA-Z0-9\s\.,]+$/'],
            'pekerjaan' => ['required', 'string', 'min:5', 'max:20', 'regex:/^[a-zA-Z\s\']+$/'],
            'tgl_lahir' => ['required', 'date'],
            'no_hp' => ['required', 'string', 'min:9', 'max:13', 'regex:/^(08|\+62)\d{9,13}$/'],
            'jenis_kelamin' => ['required', Rule::in(['laki-laki', 'perempuan'])],
        ];
    
        $validatedData = $request->validate($rules);
    
        $user->name = $validatedData['name'];
        $user->pekerjaan = $validatedData['pekerjaan'];
        $user->alamat = $validatedData['alamat'];
        $user->tgl_lahir = $validatedData['tgl_lahir'];
        $user->no_hp = $validatedData['no_hp'];
        $user->jenis_kelamin = $validatedData['jenis_kelamin'];
        $user->save();
    
        // No need to return a success message or check for errors
        // The update operation is performed silently
    }
    
}
