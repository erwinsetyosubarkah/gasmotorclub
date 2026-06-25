<?php

namespace App\Repositories\Admin;

use App\Models\{Category,Post};
use App\Repositories\Contracts\Admin\AdminPostRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPostRepository implements AdminPostRepositoryInterface
{
    public function all()
    {
        $user = auth()->user();
        $posts = Post::where('user_id',$user->id)->get();
        $categories = Category::all();
        return [
            'page_title' => 'Artikel',
            'posts' => $posts,
            'categories' => $categories
        ];
    }

    public function store(array $data, object $request)
    {
        //get user id login
        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = '<p>'.Str::limit(strip_tags($request->body),100,'...').'</p>';

        //jika ada gambar baru
        if($request->file('post_image')){
            $data['post_image'] = $request->file('post_image')->store('post-images/post');
        }

        Post::create($data);
        Alert::success('Berhasil', 'Data artikel berhasil ditambah !');
        return [
            'page_title' => 'Artikel',
            'posts' => Post::all(),
            'categories' => Category::all()
        ];
    }

    public function destroy(object $data)
    {
        Storage::delete($data->post_image);
        Post::destroy($data->id);
        Alert::success('Berhasil', 'Data artikel berhasil dihapus !');
    }

    public function showEdit(object $data)
    {
        $categories = Category::all();
        return [
            'page_title' => 'Ubah Artikel',
            'post' => $data,
            'categories' => $categories
        ];
    }

    public function edit(array $data, object $post, object $request)
    {
        //get user id login
        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = '<p>'.Str::limit(strip_tags($request->body),100,'...').'</p>';

        //jika ada gambar baru
        if($request->file('post_image')){
            //jika gambar lama isi (ada gambar lama)
            if($request->old_post_image){
                // hapus gambar lama
                Storage::delete($request->old_post_image);
            }
            $data['post_image'] = $request->file('post_image')->store('post-images/post');
        }

        Post::where('id',$post->id)
                    ->update($data);
        Alert::success('Berhasil', 'Data artikel berhasil diubah !');
    }

    public function findPost(string|int $identifier)
    {
        if (is_int($identifier)) {
            // find by ID
            return Post::find($identifier);
        }

        if (is_string($identifier)) {
            // find by title
            return Post::where('title', 'LIKE', "%{$identifier}%")->get();
        }
    }

}
