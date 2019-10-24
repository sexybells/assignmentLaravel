<?php

namespace App\Http\Controllers\User;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id) {
         $comment = new Comment();
         $comment->post_id = $id;
         $comment->content = $request->input('content-comment');
         $comment->user_id = Auth::user()->id;
         $comment->save();
         return redirect()->back();
    }

    public function destroy($id) {
        $comment = Comment::find($id);
        $comment->is_active = false;
        $comment->save();
        return redirect()->back();
    }
}
