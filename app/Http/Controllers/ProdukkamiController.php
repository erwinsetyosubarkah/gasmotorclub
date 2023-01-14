<?php

namespace App\Http\Controllers;

use App\Models\Myproduct;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProdukkamiController extends Controller
{
    public function index() {

        $produkkami = Myproduct::latest();

        if(request('search')){
            $produkkami->where('product_name','like', '%' . request('search') . '%');
        }

        return view('produkkami',[
            'page_title' => 'Produk Kami',
            'profile' => Profile::first(),
            'produkkami' => $produkkami->paginate(5)
        ]);
    }

    public function show(Myproduct $produkkami) {
     
        return view('produkkamisingle',[
            'page_title' => 'Produk Kami',
            'profile' => Profile::first(),
            'produkkami' => Myproduct::find($produkkami->id)
        ]);
    }
}
