<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPostController extends Controller
{
    public function index() {
        return view('admin/post',[
            'page_title' => 'Artikel',
            'posts' => Post::all(),
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title'  => 'required|min:5',
            'category_id' => 'required',
            'slug' => 'required|min:5|unique:posts',
            'body' => 'required',
            'post_image' => 'image|file|max:2048|required'
        ]);

        //get user id login
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = '<p>'.Str::limit(strip_tags($request->body),100,'...').'</p>';

        //jika ada gambar baru
        if($request->file('post_image')){
            $validatedData['post_image'] = $request->file('post_image')->store('post-images/post');
        }
        
        Post::create($validatedData);
        Alert::success('Berhasil', 'Data artikel berhasil ditambah !');
        return view('admin/post',[
            'page_title' => 'Artikel',
            'posts' => Post::all(),
            'categories' => Category::all()
        ]);
        
    }

    public function destroy(Post $post) {
        
        Storage::delete($post->post_image);
        Post::destroy($post->id);
        Alert::success('Berhasil', 'Data artikel berhasil dihapus !');
        return redirect('/admin-post');
        
    }

    public function showedit(Post $post) {
  
        return view('admin/postedit',[
            'page_title' => 'Ubah Artikel',
            'post' => Post::find($post->id),
            'categories' => Category::all()
        ]);
        
    }

    public function edit(Post $post,Request $request) {
        $validatedData = $request->validate([
            'title'  => 'required|min:5',
            'category_id' => 'required',
            'slug' => 'required|min:5',
            'body' => 'required',
            'post_image' => 'image|file|max:2048'
        ]);

        //get user id login
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = '<p>'.Str::limit(strip_tags($request->body),100,'...').'</p>';

        //jika ada gambar baru
        if($request->file('post_image')){
            //jika gambar lama isi (ada gambar lama)
            if($request->old_post_image){
                // hapus gambar lama
                Storage::delete($request->old_post_image);
            }
            $validatedData['post_image'] = $request->file('post_image')->store('post-images/post');
        }
        
        Post::where('id',$post->id)
                    ->update($validatedData);
        Alert::success('Berhasil', 'Data artikel berhasil diubah !');
        return redirect('/admin-post');
        
    }
}
