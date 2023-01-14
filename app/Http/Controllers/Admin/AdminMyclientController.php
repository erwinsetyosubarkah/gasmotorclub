<?php

namespace App\Http\Controllers\Admin;

use App\Models\Myclient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMyclientController extends Controller
{
    public function index() {
        return view('admin/myclient',[
            'page_title' => 'Klien Kami',
            'myclients' => Myclient::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'client_name'  => 'required|min:5',
            'company_name' => 'required',
            'client_address' => 'required',
            'client_image' => 'image|file|max:2048|required'
        ]);

        //jika ada gambar baru
        if($request->file('client_image')){
            $validatedData['client_image'] = $request->file('client_image')->store('post-images/client');
        }
        
        Myclient::create($validatedData);
        Alert::success('Berhasil', 'Data klien berhasil ditambah !');
        return view('admin/myclient',[
            'page_title' => 'Klien Kami',
            'myclients' => Myclient::all()
        ]);
        
    }

    public function destroy(Myclient $myclient) {
        
        Storage::delete($myclient->client_image);
        Myclient::destroy($myclient->id);
        Alert::success('Berhasil', 'Data klien berhasil dihapus !');
        return redirect('/admin-myclient');
        
    }

    public function showedit(Myclient $myclient) {
  
        return view('admin/myclientedit',[
            'page_title' => 'Ubah Klien',
            'myclient' => Myclient::find($myclient->id)
        ]);
        
    }

    public function edit(Myclient $myclient,Request $request) {
        $validatedData = $request->validate([
            'client_name'  => 'required|min:5',
            'company_name' => 'required',
            'client_address' => 'required',
            'client_image' => 'image|file|max:2048'
        ]);

        //jika ada gambar baru
        if($request->file('client_image')){
            //jika gambar lama isi (ada gambar lama)
            if($request->old_client_image){
                // hapus gambar lama
                Storage::delete($request->old_client_image);
            }
            $validatedData['client_image'] = $request->file('client_image')->store('post-images/client');
        }

        Myclient::where('id',$myclient->id)
                    ->update($validatedData);
        Alert::success('Berhasil', 'Data klien berhasil diubah !');
        return redirect('/admin-myclient');
        
    }
}
