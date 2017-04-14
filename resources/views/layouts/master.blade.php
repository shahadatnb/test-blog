<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog | @yield('title')</title>

    <!-- Bootstrap -->
     {!! Html::style('css/bootstrap.css') !!}
	@yield('stylesheet')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/')? "active":"" }}"><a href="/">Home</a></li>
        <li class="{{ Request::is('about')? "active":"" }}"><a href="/about">About</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>{!! Html::linkRoute('posts.index','All Posts') !!}</li>
            <li>{!! Html::linkRoute('posts.create','New Post') !!}</li>
            <li><a href="{{ Route('categories.index') }}">Categories</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello {{ Auth::user()->name }} <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('posts.index') }}">Post</a></li>
            <li><a href="{{ route('categories.index') }}">Category</a></li>
            <li><a href="{{ route('tags.index') }}">Tag</a></li>
            <li class="divider"></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </li>
        @else
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="container">
      @include('partials._message')
    	@yield('content')
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {!! Html::script('js/vendor/jquery-1.10.2.min.js') !!}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {!! Html::script('js/bootstrap.min.js') !!}

    @yield('scripts')
  </body>
</html>
