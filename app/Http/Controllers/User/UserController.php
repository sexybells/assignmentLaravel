<?php

namespace App\Http\Controllers\User;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class UserController extends Controller
{
    public function index($id) {
        $user = User::find($id);
        $categories = Category::all();
        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10);
        return view('user/user', compact('user', 'categories', 'posts'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->dateOfBirth = $request->input('dateOfBirth');
        $user->email = $request->input('email');
        if(!is_null($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
        return redirect()->back();
    }
}
