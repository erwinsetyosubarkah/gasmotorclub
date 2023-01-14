<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminGaleryController extends Controller
{
    public function index() {
        return view('admin/galery',[
            'page_title' => 'Galeri',
            'galeries' => Galery::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'image_title'  => 'required',
            'galery_image' => 'image|file|max:2048|required'
        ]);

        //jika ada gambar baru
        if($request->file('galery_image')){
            $validatedData['galery_image'] = $request->file('galery_image')->store('post-images/galery');
        }
        
        Galery::create($validatedData);
        Alert::success('Berhasil', 'Data galery berhasil ditambah !');
        return view('admin/galery',[
            'page_title' => 'Galeri',
            'galeries' => Galery::all()
        ]);
        
    }

    public function destroy(Galery $galery) {
        
        Storage::delete($galery->galery_image);
        Galery::destroy($galery->id);
        Alert::success('Berhasil', 'Data galeri berhasil dihapus !');
        return redirect('/admin-galery');
        
    }

    public function showedit(Galery $galery) {
  
        return view('admin/galeryedit',[
            'page_title' => 'Galeri',
            'galery' => Galery::find($galery->id)
        ]);
        
    }

    public function edit(Galery $galery,Request $request) {
        $validatedData = $request->validate([
            'image_title'  => 'required',
            'galery_image' => 'image|file|max:2048'
        ]);

        //jika ada gambar baru
        if($request->file('galery_image')){
            //jika gambar lama isi (ada gambar lama)
            if($request->old_galery_image){
                // hapus gambar lama
                Storage::delete($request->old_galery_image);
            }
            $validatedData['galery_image'] = $request->file('galery_image')->store('post-images/galery');
        }

        Galery::where('id',$galery->id)
                    ->update($validatedData);
        Alert::success('Berhasil', 'Data galeri berhasil diubah !');
        return redirect('/admin-galery');
        
    }
}
