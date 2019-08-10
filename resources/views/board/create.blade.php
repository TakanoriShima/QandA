@extends('common.app')
@section('content')
<?php
 $content = $_GET['content'];
?>
<div class="col-xs-6 col-xs-offset-2">

<h1>投稿ページ</h1>
@if(session('message'))
 <div class="bg-info">
  <p>{{ session('message') }}</p>
</div>
@endif
@foreach($errors->all() as $message)
 <p class="bg-danger">{{ $message }}</p>
@endforeach
<form method="POST" action="/posts">
 @csrf
  <div class="form-group">
   <label for="title" class="">タイトル</label>
   <div class="">
    <input type="text" class="col-sm-12" name="title">
   </div>
  </div>
  <div class="form-group">
   <label for="category_id" class="">カテゴリー</label>
   <div class="">
    <select name="category_id" type="text" class="">
     <option></option>
     <option value="1" name="農業">農業</option>
     <option value="2" name="漁業">漁業</option>
     <option value="3" name="畜産">畜産</option>
     <option value="4" name="恋愛">恋愛</option>
     <option value="5" name="芸能">芸能</option>
     <option value="6" name="政治">政治</option>
     <option value="7" name="宗教">宗教</option>
     <option value="8" name="生活">生活</option>
    </select>
   </div>
  </div>
  <div class="form-group">
   <label for="content" class="">本文</label>
    <div class="">
     <textarea class="col-sm-12" name="content">
     <?php
     if(isset($content)){
     echo $content; 
     }
     ?></textarea>
    </div>
   </div>
   <div class="form-group">
    <button type="submit" class="btn btn-primary">投稿する</button>
   </div>
</form>

</div>

@stop