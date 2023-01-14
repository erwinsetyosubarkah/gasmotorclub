<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Visidanmisi;
use Illuminate\Http\Request;

class VisidanmisiController extends Controller
{
    public function index() {
        return view('visidanmisi',[
            'page_title' => 'Visi dan Misi',
            'profile' => Profile::first(),
            'visidanmisi' => Visidanmisi::first()
        ]);
    }
}
