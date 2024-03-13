<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $userEmail = session('user_email');
        $user = Auth::user();

        return view('pages.profile', compact('user'));
    }
}
