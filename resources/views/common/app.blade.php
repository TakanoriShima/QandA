<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>@yield('title')</title>
        <style>
            .allcomment{
                display: none;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="row">
                <div class="col-7">
                    <div><img class ="p-1 m-1"style= "width: 17vh; height: 17vh;" src="img/logo3.png"></div>
                    
@if (Auth::check())
@guest
<a href="{{ route('login') }}">{{ __('Login') }}</a>
<!--</li>-->
@if (Route::has('register'))
<!--<li class="nav-item">-->
<a href="{{ route('register') }}">{{ __('Register') }}</a>
<!--</li>-->
@endif
@else
<!--<li class="nav-item dropdown">-->

<a style="style: right; color: black;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
{{ Auth::user()->name }} <span class="caret"></span>
</a>

<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
<!--</li>-->
@endguest
<!--</ul>-->
</div>
@else
<p>＊ログインしていません。【<a href="/login">ログイン</a>｜<a href="register">登録</a>】</p>
@endif

            </header>
            <nav id="navigation" class="navbar navbar-expand-lg navbar-light bg-success">
                  <a class="navbar-brand" href="/">HOME</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
    
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item mx-3">
                        <a class="nav-link" href="/category">Category</a>
                      </li>
                      <li class="nav-item mx-3">
                        <a class="nav-link" href="/ranking">Ranking</a>
                      </li>
                      <li class="nav-item mx-3">
                        <a class="nav-link" href="/tout">Tout Q & R </a>
                      </li>
                      <li class="nav-item mx-3">
                        <a class="nav-link" href="/mon_page">Mon page</a>
                      </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn bg-white btn-white my-2 my-sm-0" type="submit">Search</button>
                    </form>
                  </div>
                </nav>
        </header>
        <main>
            <div class="row">
                 <div class="col-sm-7">
                    @yield('content')
                </div>
                <div class="col-sm-4">
                    <h2 class="text-center"><a href="/ranking" style="text-decoration: none; color: black;">populaire Q & R</a></h2>
                    <ul style="list-style-type: none;" class="text-center">
                        <div style="border-bottom: solid 1px #e4e4e4;" style="my-2">
                        <h2>no.1</h2>
                        <li>吉本興業は大丈夫なのでしょうか？</li>
                        </div>
                        <div style="border-bottom: solid 1px #e4e4e4;" style="my-2">
                        <h2>no.2</h2>
                        <li>吉本興業は大丈夫なのでしょうか？</li>
                        </div>
                        <div style="border-bottom: solid 1px #e4e4e4;" style="my-2">
                        <h2>no.3</h2>
                        <li>吉本興業は大丈夫なのでしょうか？</li>
                        </div>
                    </ul>
                    <ul style="list-style-type: none;" class="text-center">
                        <li>吉本興業は大丈夫なのでしょうか？</li>
                        <li>吉本興業は大丈夫なのでしょうか？</li>
                        <li>吉本興業は大丈夫なのでしょうか？</li>
                        <li>吉本興業は大丈夫なのでしょうか？</li>
                        <li>吉本興業は大丈夫なのでしょうか？</li>
                        <li>吉本興業は大丈夫なのでしょうか？</li>
                    </ul>
                </div>
            </div>
       </main>
        <footer class="bg-success px-3 pt-3">
            <p> Nous rassemblons des connaissances pour le développement du Sénégal
            <span style="float: right;">copyright in 2019 by takano seiya</span></p>
        </footer>
        <script>
            document.getElementById('comment').addEventListener('click', function(){
               if( !document.getElementById('allcomment').classList.contains('allcomment')){
                   document.getElementById('allcomment').classList.add('allcomment');
               }else{
                   document.getElementById('allcomment').classList.remove('allcomment');
               }
            });
        </script>
    </body>
</html>