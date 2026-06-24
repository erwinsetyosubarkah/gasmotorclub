<?php

namespace App\Repositories;

use App\Models\{Post, Profile};

use App\Repositories\Contracts\ArtikelRepositoryInterface;

class ArtikelRepository implements ArtikelRepositoryInterface
{

    public function latest(array $data)
    {
        $artikels = Post::latest();

        if(isset($data['search'])){
            $artikels->where('title','like', '%' . $data['search'] . '%');
        }

        $profile = Profile::first();

        return [
            'page_title' => 'Artikel',
            'profile' => $profile,
            'artikels' => $artikels->paginate(6)
        ];
    }

    public function show(array $data)
    {

        $profile = Profile::first();
        $singleArtikel = Post::find($data['id']);

        return [
            'page_title' => 'Artikel',
            'profile' => $profile,
            'artikel' => $singleArtikel
        ];
    }
}
