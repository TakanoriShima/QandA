<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::orderBy('id','desc')->paginate(10);
      $user = Auth::user();
      
      $param = [
          'posts' => $posts,
          'user' => $user,
          ];
      
      return view('front.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $posts = Post::orderBy('id','desc')->get();
      $user = Auth::user();
        $param = [
          'posts' => $posts,
          'user' => $user,
          ];
      
      return view('board.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = [
        'title' => 'required',
        'content'=>'required',
        'category_id' => 'required',
        'comment_count' => 'numeric',
      ];

      $messages = [
        'title.required' => 'タイトルを正しく入力してください。',
        'content.required' => '本文を正しく入力してください。',
        'category_id.required' => 'カテゴリーを選択してください。',
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if ($validator->passes()) {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect('/')
          ->with('message', '投稿が完了しました。');
      }else{
        return redirect('/')
          ->withErrors($validator)
          ->withInput();
      }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('board.single',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    
    public function showCategory($id)
{
	$category_posts = Post::where('category_id', $id)->get();

	return view('category', $category_posts);
}
}
