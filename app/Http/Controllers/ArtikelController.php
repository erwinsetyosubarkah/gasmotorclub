<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index() {

        $artikels = Post::latest();

        if(request('search')){
            $artikels->where('title','like', '%' . request('search') . '%');
        }

        return view('artikel',[
            'page_title' => 'Artikel',
            'profile' => Profile::first(),
            'artikels' => $artikels->paginate(10)
        ]);
    }

    public function show(Post $artikel) {
     
        return view('artikelsingle',[
            'page_title' => 'Artikel',
            'profile' => Profile::first(),
            'artikel' => Post::find($artikel->id)
        ]);
    }
}
