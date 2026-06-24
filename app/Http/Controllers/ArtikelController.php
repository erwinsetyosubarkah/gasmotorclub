<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtikelIndexRequest;
use App\Models\Post;
use App\Repositories\Contracts\ArtikelRepositoryInterface;

class ArtikelController extends Controller
{

    private Object $artikelRepository;

    public function __construct(ArtikelRepositoryInterface $artikelRepository)
    {
        $this->artikelRepository = $artikelRepository;
    }

    public function index(ArtikelIndexRequest $request) {

        $validatedData = $request->validated();
        $latestArtikels = $this->artikelRepository->latest($validatedData);

        return view('artikel',$latestArtikels);
    }

    public function show(Post $artikel) {
        $singleArtikel = $this->artikelRepository->show(["id" => $artikel->id]);
        return view('artikelsingle', $singleArtikel);
    }
}
