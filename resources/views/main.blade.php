<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/selec2.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/fontawesome/css/fontawesome.css')}}">
    <!--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    -->
    <!--@yield('style'); pour la verification en utilisant parsley JS-->

    @yield('title')

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
      <a class="navbar-brand" href="{{url('/')}}">Laravel Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/accueil')}}">Home <?php if( Request::is("/accueil")) { echo "<span class='sr-only'>(current)</span>"; } ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/about')}}">About </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/contact')}}">Contact </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/post/create')}}">Post </a>
          </li>
          <li class="nav-item">
          </li>
        </ul>
        <!-- Example split danger button -->
        <div class="btn-group">
          <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hello {{Auth::user()->name}}<span class="sr-only">Toggle Dropdown</span>
          </button>
          <a class="nav-link" href="{{url('/profile')}}">
            <img src="{{asset('img/crow clown.jpg')}}" width='60' height="40" style="border-radius:50%;">
          </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('post.index') }}">All Posts</a>
              <a class="dropdown-item" href="{{route('categories.index')}}">All Categories</a>
              <a class="dropdown-item" href="{{route('tag.index')}}">All Tags</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('logout')}}">Deconnexion</a>
            </div>
     <!-- 
          <form class="form-inline my-2 my-lg-0" method="get">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      -->
        </div>
      </div>
    </nav>
    
    <div class="container">
            @include("complement._messages")
            @yield("content")
    </div>



 <script src="/js/app.js"></script>

<!-- Footer -->
<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				</hr>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="#" target="_blank">Merouane Walker</a></p>
				</div>
				</hr>
			</div>
		</div>
	</section>
	<!-- ./Footer -->
<!-- @yield('script'); -->
<script src="{{asset('js/fontawesome/js/fontawesome.js')}}"></script>
  </body>
</html
