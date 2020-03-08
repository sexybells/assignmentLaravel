<?php

namespace App\Http\Controllers\User;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    public function store(Request $request) {
        // $request->validate([
        //     'title-blog' => 'required|title-blog',
        //     'content-blog' => 'required|content-blog',


        // ],
        //     [
        //         'title-blog.required'=>' Tiêu đê không được để trống!',
        //         'content-blog.required'=>'Nội dung không được để trống!',

        //     ]);
        $post = new Post();
        $post->title = $request->input('title-blog');
        $post->content = $request->input('content-blog');
        $post->category_id = $request->input('category-blog');
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->back();
    }

    public function show($id) {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->orderBy('created_at', 'desc')->get();
        return view('user.post', compact('post', 'comments'));
    }
}
