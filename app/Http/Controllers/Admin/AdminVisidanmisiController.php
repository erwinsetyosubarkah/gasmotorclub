<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visidanmisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminVisidanmisiController extends Controller
{
    public function index() {
        return view('admin/visidanmisi',[
            'page_title' => 'Visi dan Misi',
            'visidanmisi' => Visidanmisi::find(1)
        ]);
    }

    public function edit(Request $request) {
        $validatedData = $request->validate([
            'title'  => 'required|min:5',
            'content' => ''
        ]);

        Visidanmisi::where('id',1)
                    ->update($validatedData);
        Alert::success('Berhasil', 'Data visi dan misi berhasil diubah !');
        return redirect('/admin-visidanmisi');
        
    }
}
