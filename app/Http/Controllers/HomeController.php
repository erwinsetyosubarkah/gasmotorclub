<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home',[
            'galeries' => Galery::all()
        ]);
    }
}
