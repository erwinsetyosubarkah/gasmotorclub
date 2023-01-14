<?php

namespace App\Http\Controllers;

use App\Models\Myclient;
use App\Models\Profile;
use Illuminate\Http\Request;

class KlienkamiController extends Controller
{
    public function index() {

        $clients = Myclient::latest();

        if(request('search')){
            $clients->where('client_name','like', '%' . request('search') . '%');
        }

        return view('klienkami',[
            'page_title' => 'Klien Kami',
            'profile' => Profile::first(),
            'clients' => $clients->paginate(5)
        ]);
    }

}
