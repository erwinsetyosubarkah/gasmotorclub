<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUserController extends Controller
{
    public function index() {
        return view('admin/user',[
            'page_title' => 'Users',
            'users' => User::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name'  => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'level' => 'required',
            'password' => 'required|min:5|max:255',
            'password2' => 'required|min:5|max:255',
            'photo' => 'image|file|max:2048'
        ]);

        if($validatedData['password2'] == $validatedData['password']){
            unset($validatedData['password2']);
            //enkripsi password
            $validatedData['password'] = Hash::make($validatedData['password']);
            
            //jika ada gambar baru
            if($request->file('photo')){
                $validatedData['photo'] = $request->file('photo')->store('post-images/user');
            }
            
            User::create($validatedData);
            Alert::success('Berhasil', 'Data user berhasil ditambah !');
            return view('admin/user',[
                'page_title' => 'Users',
                'users' => User::all()
            ]);
        }else{
            Alert::error('Gagal!', 'Maaf gagal karena password dan konfirmasi password yang kamu isi tidak sama');
            return view('admin/user');
        }

        
    }

    public function destroy(User $user) {
        
        Storage::delete($user->photo);
        User::destroy($user->id);
        Alert::success('Berhasil', 'Data user berhasil dihapus !');
        return redirect('/admin-user');
        
    }

    public function showedit(User $user) {
  
        return view('admin/useredit',[
            'page_title' => 'Ubah User',
            'user' => User::find($user->id)
        ]);
        
    }

    public function edit(User $user,Request $request) {
        $validatedData = $request->validate([
            'name'  => 'required|max:255',
            'username' => 'required|min:3|max:255',
            'email' => 'required|email:dns',
            'level' => 'required',
            'photo' => 'image|file|max:2048'
        ]);

        //jika ada gambar baru
        if($request->file('photo')){
            //jika gambar lama isi (ada gambar lama)
            if($request->old_photo){
                // hapus gambar lama
                Storage::delete($request->old_photo);
            }
            $validatedData['photo'] = $request->file('photo')->store('post-images/user');
        }

        User::where('id',$user->id)
                    ->update($validatedData);
        Alert::success('Berhasil', 'Data user berhasil diubah !');
        return redirect('/admin-user');
      
    }
}
