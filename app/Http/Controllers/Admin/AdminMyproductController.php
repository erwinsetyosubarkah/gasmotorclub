<?php

namespace App\Http\Controllers\Admin;

use App\Models\Myproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMyproductController extends Controller
{
    public function index() {
        return view('admin/myproduct',[
            'page_title' => 'Produk Kami',
            'myproducts' => Myproduct::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'product_name'  => 'required',
            'stock' => 'required',
            'price' => 'required',
            'product_image' => 'image|file|max:2048',
            'product_description' => ''
        ]);

        //jika ada gambar baru
        if($request->file('product_image')){
            $validatedData['product_image'] = $request->file('product_image')->store('post-images/product');
        }
        
        Myproduct::create($validatedData);
        Alert::success('Berhasil', 'Data produk berhasil ditambah !');
        return view('admin/myproduct',[
            'page_title' => 'Produk Kami',
            'myproducts' => Myproduct::all()
        ]);
        
    }

    public function destroy(Myproduct $myproduct) {
        
        Storage::delete($myproduct->product_image);
        Myproduct::destroy($myproduct->id);
        Alert::success('Berhasil', 'Data produk berhasil dihapus !');
        return redirect('/admin-myproduct');
        
    }

    public function showedit(Myproduct $myproduct) {
  
        return view('admin/myproductedit',[
            'page_title' => 'Ubah Produk',
            'myproduct' => Myproduct::find($myproduct->id)
        ]);
        
    }

    public function edit(Myproduct $myproduct,Request $request) {
        $validatedData = $request->validate([
            'product_name'  => 'required',
            'stock' => 'required',
            'price' => 'required',
            'product_image' => 'image|file|max:2048',
            'product_description' => ''
        ]);

        //jika ada gambar baru
        if($request->file('product_image')){
            //jika gambar lama isi (ada gambar lama)
            if($request->old_product_image){
                // hapus gambar lama
                Storage::delete($request->old_product_image);
            }
            $validatedData['product_image'] = $request->file('product_image')->store('post-images/product');
        }

        Myproduct::where('id',$myproduct->id)
                    ->update($validatedData);
        Alert::success('Berhasil', 'Data produk berhasil diubah !');
        return redirect('/admin-myproduct');
        
    }
}
