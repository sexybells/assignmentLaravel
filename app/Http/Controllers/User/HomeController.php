<?php

namespace App\Http\Controllers\User;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $categories = Category::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('user.home', compact('categories', 'posts'));
    }
}
