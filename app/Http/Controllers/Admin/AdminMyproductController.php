<?php

namespace App\Http\Controllers\Admin;

use App\Models\Myproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Myclient;
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
            'category_name'  => 'required|min:5',
            'category_slug' => 'required|min:5'
        ]);
        Myproduct::create($validatedData);
        Alert::success('Berhasil', 'Data kategori berhasil ditambah !');
        return view('admin/category',[
            'page_title' => 'Kategori',
            'myproducts' => Myclient::all()
        ]);
        
    }

    public function destroy(Category $category) {
        
        Category::destroy($category->id);
        Alert::success('Berhasil', 'Data kategori berhasil dihapus !');
        return redirect('/admin-category');
        
    }

    public function showedit(Category $category) {
  
        return view('admin/categoryedit',[
            'page_title' => 'Ubah Kategori',
            'category' => Category::find($category->id)
        ]);
        
    }

    public function edit(Category $category,Request $request) {
        $validatedData = $request->validate([
            'category_name'  => 'required|min:5',
            'category_slug' => 'required|min:5'
        ]);

        Category::where('id',$category->id)
                    ->update($validatedData);
        Alert::success('Berhasil', 'Data kategori berhasil diubah !');
        return redirect('/admin-category');
        
    }
}
