<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProfileController extends Controller
{
    public function index() {
        return view('admin/profile',[
            'page_title' => 'Profile',
            'profile' => Profile::find(1)
        ]);
    }


    public function edit(Request $request) {
        $validatedData = $request->validate([
            'club_name'  => 'required|min:5',
            'club_name_abbreviation' => 'required',
            'club_logo' => 'image|file|max:2048',
            'email' => '',
            'phone' => '',
            'address' => '',
            'description' => ''
        ]);
        
        //jika ada gambar baru
        if($request->file('club_logo')){
            //jika gambar lama isi (ada gambar lama)
            if($request->old_club_logo){
                // hapus gambar lama
                Storage::delete($request->old_club_logo);
            }
            $validatedData['club_logo'] = $request->file('club_logo')->store('post-images/profile');
        }

        Profile::where('id',1)
                    ->update($validatedData);
        Alert::success('Berhasil', 'Data kategori berhasil diubah !');
        return redirect('/admin-profile');
        
    }
}
