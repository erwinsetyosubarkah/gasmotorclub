<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPostEditRequest;
use App\Http\Requests\Admin\AdminPostStoreRequest;
use App\Repositories\Contracts\Admin\AdminPostRepositoryInterface;

/**
 * Summary of AdminPostController
 */
class AdminPostController extends Controller
{

    /**
     * Summary of adminPostRepository
     * @var object
     */
    private Object $adminPostRepository;

    /**
     * Summary of __construct
     * @param AdminPostRepositoryInterface $adminPostRepository
     */
    public function __construct(AdminPostRepositoryInterface $adminPostRepository)
    {
        $this->adminPostRepository = $adminPostRepository;
    }

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $posts = $this->adminPostRepository->all();
        return view('admin/post',$posts);
    }

    /**
     * Summary of store
     * @param AdminPostStoreRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function store(AdminPostStoreRequest $request) {
        $validatedData = $request->validated();

        $storeDataReturn = $this->adminPostRepository->store($validatedData, $request);
        return view('admin/post',$storeDataReturn);

    }

    /**
     * Summary of destroy
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post) {

        $this->adminPostRepository->destroy($post);

        return redirect('/admin-post');

    }

    /**
     * Summary of showedit
     * @param Post $post
     * @return \Illuminate\Contracts\View\View
     */
    public function showedit(Post $post) {
        $showEditDataReturn = $this->adminPostRepository->showEdit($post);

        return view('admin/postedit',$showEditDataReturn);

    }

    /**
     * Summary of edit
     * @param Post $post
     * @param AdminPostEditRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Post $post,AdminPostEditRequest $request) {

        $validatedData = $request->validated();
        $this->adminPostRepository->edit($validatedData, $post, $request);

        return redirect('/admin-post');

    }
}
