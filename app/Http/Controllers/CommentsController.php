<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Validator;

class CommentsController extends Controller
{
    public function index() {
        $user = Auth::user();
        $posts = Post::orderBy('id','desc')->paginate(10);
        $param = [
            'user' => $user,
            'posts' => $posts,
            ];
        return view('board.single',$param);
    }
    
    public function store(Request $request)
    {
    	$rules = [
    		'commenter' => 'required',
    		'comment'=>'required',
    	];
    
    	$messages = [
    		'commenter.required' => 'タイトルを正しく入力してください。',
    		'comment.required' => '本文を正しく入力してください。',
    	];
    $validator = Validator::make($request->all(), $rules, $messages);
    
    	if ($validator->passes()) {
    		$comment = new Comment;
    		$comment->commenter = $request->commenter;
    		$comment->comment = $request->comment;
    		$comment->post_id = $request->post_id;
    		$comment->save();
    		return redirect('/')
    			->with('message', '投稿が完了しました。');
    	}else{
    		return redirect('/')
    			->withErrors($validator)
    			->withInput();
    	}
    }
}