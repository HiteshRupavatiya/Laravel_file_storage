<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->get();
        return view('index',compact('posts'));
    }

    public function createPost()
    {
        $users = DB::table('users')->get(['id', 'name']);
        return view('create_post', compact('users'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|unique:posts,title',
            'body' => 'required|max:255|alpha',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'user_id' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'),$imageName);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imageName,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('post.index');
    }
}
