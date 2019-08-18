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
        //fwrite(STDERR, print_r('a'), TRUE));
        //dd('OK');
        //dd($user);
        return view('front.index', $param);
    }
}
