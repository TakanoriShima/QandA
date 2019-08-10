<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Post;


class CategoryController extends Controller
{
    
    public function index() {
        $user = Auth::user();
        $posts = Post::orderBy('id','desc')->paginate(10);
        $param = [
            'user' => $user,
            'posts' => $posts,
            ];
        return view('category.index',$param);
    }
}
