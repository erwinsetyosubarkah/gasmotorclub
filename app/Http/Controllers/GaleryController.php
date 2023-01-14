<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Profile;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index() {

        $galeries = Galery::latest();

        if(request('search')){
            $galeries->where('image_title','like', '%' . request('search') . '%');
        }

        return view('galery',[
            'page_title' => 'Galery Foto',
            'profile' => Profile::first(),
            'galeries' => $galeries->paginate(10)
        ]);
    }

}
