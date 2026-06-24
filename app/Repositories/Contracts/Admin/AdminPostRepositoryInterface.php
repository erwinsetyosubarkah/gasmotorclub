<?php

namespace App\Repositories\Contracts\Admin;

interface AdminPostRepositoryInterface
{
    public function all();
    public function store(array $data, object $request);

    public function destroy(object $data);

    public function showEdit(object $data);

    public function edit(array $data, object $post, object $request);

}
