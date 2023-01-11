<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminRegisterController extends Controller
{
    public function index() {
        return view('admin/register');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name'  => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'level' => 'required',
            'password' => 'required|min:5|max:255',
            'password2' => 'required|min:5|max:255'
        ]);

        if($validatedData['password2'] == $validatedData['password']){
            unset($validatedData['password2']);
            //enkripsi password
            $validatedData['password'] = Hash::make($validatedData['password']);
            User::create($validatedData);
            Alert::success('Selamat', 'Pendaftaran Berhasil !');
            return view('admin/register');
        }else{
            Alert::error('Gagal!', 'Maaf Pendaftaran gagal karena password dan konfirmasi password yang kamu isi tidak sama');
            return view('admin/register');
        }

        
        
    }
}
