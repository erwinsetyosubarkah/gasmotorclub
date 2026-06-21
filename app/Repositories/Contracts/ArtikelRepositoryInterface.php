<?php

namespace App\Repositories\Contracts;

interface ArtikelRepositoryInterface
{
    public function latest(array $data);
    public function show(array $data);
}
