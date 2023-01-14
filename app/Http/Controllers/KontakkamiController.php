<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class KontakkamiController extends Controller
{
    public function index() {

        return view('kontakkami',[
            'page_title' => 'Kontak Kami',
            'profile' => Profile::first()
        ]);
    }
}
