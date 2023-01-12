<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visidanmisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminVisidanmisiController extends Controller
{
    public function index() {
        return view('admin/visidanmisi',[
            'page_title' => 'Visi dan Misi',
            'visidanmisi' => Visidanmisi::find(1)
        ]);
    }
}
