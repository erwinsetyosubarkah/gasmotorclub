<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Post;
use App\Models\Profile;

class HomeController extends Controller
{
    public function index() {
        return view('home',[
            'articles' => Post::latest()->take(3)->get(),
            'galeries' => Galery::all(),
            'profile'  => Profile::first()
        ]);
    }
}
