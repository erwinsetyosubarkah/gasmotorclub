<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtikelIndexRequest;
use App\Http\Requests\ArtikelShowRequest;
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

    public function show(ArtikelShowRequest $request) {

        $validatedData = $request->validated();
        $singleArtikel = $this->artikelRepository->show($validatedData);
        return view('artikelsingle', $singleArtikel);
    }
}
