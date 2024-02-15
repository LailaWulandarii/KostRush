<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use app\Models\Users;
use Illuminate\Http\Request;

class ManagementUserController extends Controller{
    public function index(){
        return "Halo ini adalah method index yang ada dalam 
        controller ManagementUser. Ini dibuat oleh Kelompok A4";
    }
}