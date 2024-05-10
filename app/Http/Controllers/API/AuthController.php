<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check credentials with role verification
        if (Auth::attempt(['email' => $loginData['email'], 'password' => $loginData['password'], 'role' => 'penyewa'])) {
            $token = $request->user()->createToken('authToken')->plainTextToken;
            return response()->json([
                'data' => $request->user(),
                'token' => $token,
                'message' => 'Login successful as penyewa', // Informative message
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid Credentials or Insufficient Permissions', // Clearer error message
        ], 401);
    }

    public function register(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:5', 'max:30', 'regex:/^[a-zA-Z\s\']+$/'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'max:12'], // Password confirmation rule
            'alamat' => ['required', 'string', 'min:15', 'max:50', 'regex:/^[a-zA-Z0-9\s\.,]+$/'],
            'pekerjaan' => ['required', 'string', 'min:5', 'max:20', 'regex:/^[a-zA-Z\s\']+$/'],
            'tgl_lahir' => ['required', 'date'],
            'no_hp' => ['required', 'string', 'min:9', 'max:13', 'regex:/^(08|\+62)\d{9,13}$/'],
            'jenis_kelamin' => ['required', Rule::in(['laki-laki', 'perempuan'])],
        ]);

        if ($validator->fails()) {
            // Handle validation errors without custom messages
            return response()->json([
                'errors' => $validator->errors(), // Return validation errors
            ], 400); // Bad Request status code
        }

        // Create new tenant user with token verification
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat, // Added closing quotation mark
            'pekerjaan' => $request->pekerjaan, // Added closing quotation mark
            'tgl_lahir' => $request->tgl_lahir,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => 'penyewa', // Assign 'penyewa' role
        ]);

        // Create token and send verification email
        // $token = $user->createToken('authToken')->plainTextToken;
        // $user->sendEmailVerification($token);

        // Send successful registration response without custom message
        return response()->json([
            'message' => 'Registration successful',
        ], 200); // Created status code
    }

    public function logout(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // If user is logged in, revoke the token
        if ($user) {
            $user->tokens()->where('name', 'authToken')->delete();

            return response()->json([
                'message' => 'Successfully logged out.',
            ], 200);
        }

        // User is not logged in, return appropriate message
        return response()->json([
            'message' => 'User is not currently logged in.',
        ], 401); // Unauthorized status code
    }

}
