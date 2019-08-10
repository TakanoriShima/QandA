<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;

class MonpageController extends Controller
{
    
    public function index(Request $requset) {
        $user = Auth::user();
        $posts = Post::orderBy('id','desc')->paginate(10);
        $param = [
            'user' => $user,
            'posts' => $posts,
            ];
        return view('monpage.index',$param);
    }
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
}
