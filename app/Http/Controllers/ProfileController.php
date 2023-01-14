<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        return view('profile',[
            'page_title' => 'Profile',
            'profile' => Profile::first()
        ]);
    }
}
