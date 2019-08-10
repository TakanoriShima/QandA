<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Post;


class FrontController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user();
        $posts = Post::orderBy('id','desc')->paginate(10);
        $param = [
            'user' => $user,
            'posts' => $posts,
            'name' => $request->name,
            ];
        return view('front.index',$param);
    }
}
