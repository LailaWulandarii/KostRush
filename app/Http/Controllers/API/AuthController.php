<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(compact('token'));
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:6', 'max:255', 'confirmed', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
            'alamat' => 'required|string|min:15|max:255',
            'tgl_lahir' => 'required|date',
            'no_hp' => ['required', 'string', 'max:15', 'regex:/^(08|\+62)\d{9,13}$/'],
            'jenis_kelamin' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Registrasi gagal. Silakan coba lagi.',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        if ($user) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return response()->json(['status' => 'success', 'message' => 'Registrasi berhasil. Silakan login.'], 201);
            }
        }

        return response()->json(['status' => 'failed', 'message' => 'Registrasi gagal. Silakan coba lagi.'], 500);
    }
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }
}
