<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPostEditRequest;
use App\Http\Requests\Admin\AdminPostStoreRequest;
use App\Repositories\Contracts\Admin\AdminPostRepositoryInterface;

class AdminPostController extends Controller
{

    private Object $adminPostRepository;

    public function __construct(AdminPostRepositoryInterface $adminPostRepository)
    {
        $this->adminPostRepository = $adminPostRepository;
    }

    public function index() {
        $posts = $this->adminPostRepository->all();
        return view('admin/post',$posts);
    }

    public function store(AdminPostStoreRequest $request) {
        $validatedData = $request->validated();

        $storeDataReturn = $this->adminPostRepository->store($validatedData, $request);
        return view('admin/post',$storeDataReturn);

    }

    public function destroy(Post $post) {

        $this->adminPostRepository->destroy($post);

        return redirect('/admin-post');

    }

    public function showedit(Post $post) {
        $showEditDataReturn = $this->adminPostRepository->showEdit($post);

        return view('admin/postedit',$showEditDataReturn);

    }

    public function edit(Post $post,AdminPostEditRequest $request) {

        $validatedData = $request->validated();
        $this->adminPostRepository->edit($validatedData, $post, $request);

        return redirect('/admin-post');

    }
}
