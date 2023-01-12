<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProfileController extends Controller
{
    public function index() {
        return view('admin/profile',[
            'page_title' => 'Profile',
            'profile' => Profile::find(1)
        ]);
    }


    public function edit(Profile $profile,Request $request) {
        $validatedData = $request->validate([
            'category_name'  => 'required|min:5',
            'category_slug' => 'required|min:5'
        ]);

        Profile::where('id',1)
                    ->update($validatedData);
        Alert::success('Berhasil', 'Data kategori berhasil diubah !');
        return redirect('/admin-category');
        
    }
}
