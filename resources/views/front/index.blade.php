@extends('common.app')

@section('title', 'Teranaga_official_Q&R')

@section('content')

<div style="border-bottom: solid 1px #e4e4e4;" class="m-1">
    <h3 class="p-2 m-2 text-center">N'hésitez pas à poser des questions</h3>
    <form method="get" action="/store" class="p-2 mx-auto">
        <textarea style="width:50vw; height: 10vh; border-radius:3px;" name="content"></textarea>
        <input class="p-2" style="float: right; border-radius: 3px;" type="submit" value="Poser">
    </form>
</div>
@if(session('message'))
　<div class="bg-info">
　　<p>{{ session('message') }}</p>
 </div>
@endif

{{-- エラーメッセージの表示 --}}
@foreach($errors->all() as $message)
    <p class="bg-danger">{{ $message }}</p>
@endforeach
@foreach($posts as $post)

<div class="card mb-4 shadow-sm">
    <h6>タイトル：{{ $post->title }}</h6>
    <small class="text-muted">{{date("Y年 m月 d日",strtotime($post->created_at))}}</small>
    <p>{{ $post->content }}</p>
    <div class="row">
        <small class="col-sm-4">カテゴリー：{{ $post->category}}</small>
        <small class="col-sm-4">回答数：{{ $post->comment_count }}</small>
        <form>
            <button action="/comment" type="submit" style="border-radius: 4px; font-size: 15px;">reponse</button>
        </form>
    </div>
    <hr/>
    <div id="comment">
        <h6>コメント一覧 ▼</h6>
        <div id="allcomment<?php echo $post->id ?>" class="allcomment">
            <p>takanoseiyaです</p>
             @foreach($post->comments as $single_comment)
            <h4>{{ $single_comment->commenter }}</h4>
            <p>{{ $single_comment->comment }}</p>
            @endforeach
        </div>
   
    </div>
</div>
@endforeach
<hr/>
{{ $posts->links() }}

@endsection