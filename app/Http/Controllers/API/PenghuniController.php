<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::get()->where('role', '=', 'penyewa');
        $data = [
            'status' => 200,
            'user' => $data
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:6', 'max:255', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
            'alamat' => 'required|string|min:15|max:255',
            'pekerjaan' => ['required', 'string', 'min:5', 'max:20', 'regex:/^[a-zA-Z\s\']+$/'],
            'tgl_lahir' => 'required|date',
            'no_hp' => ['required', 'string', 'max:15', 'regex:/^(08|\+62)\d{9,13}$/'],
            'jenis_kelamin' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                "status" => 422,
                "message" => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'penyewa';
            $user->alamat = $request->alamat;
            $user->pekerjaan = $request->pekerjaan;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->no_hp = $request->no_hp;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->save();

            $data = [
                'status' => 200,
                'message' => 'Data sudah diupload'
            ];
            return response()->json($data, 200);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataUser = User::get()->where('id', '=', $id);


        if ($dataUser->isEmpty()) {
            $data = [
                'status' => 404,
                'user' => "Data tidak ditemukan"
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                'status' => 200,
                'user' => $dataUser
            ];
            return response()->json($data, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:6', 'max:255', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
            'alamat' => 'required|string|min:15|max:255',
            'tgl_lahir' => 'required|date',
            'no_hp' => ['required', 'string', 'max:15', 'regex:/^(08|\+62)\d{9,13}$/'],
            'jenis_kelamin' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                "status" => 422,
                "message" => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'penyewa';
            $user->alamat = $request->alamat;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->no_hp = $request->no_hp;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->save();

            $data = [
                'status' => 200,
                'message' => 'Data sudah diupdate'
            ];
            return response()->json($data, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        $data = [
            'status' => 200,
            'message' => 'Data sudah dihapus'
        ];
        return response()->json($data, 200);
    }
}
