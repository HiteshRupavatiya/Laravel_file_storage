<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->get();
        return $posts;
    }

    public function createPost()
    {
        return view('create_post');
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|alpha|unique:posts,title',
            'body' => 'required|max:255|alpha',
            'post_image' => 'required|max|image|mimes:jpg,png,jpeg|max:1024',
            'user_id' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
    }
}
