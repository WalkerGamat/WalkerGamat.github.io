@extends("main")

@section("title")
        <title>Read Post</title>
@endsection

@section("content")

<div class="container" style="margin-top:10px;">
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
      <h1 class="display-4">Hello, world!</h1>
      <p class="lead">Thank you for visiting our website. this is my first web site developed with laravel 5.6 so i can put it in my cv.</p>
      <p>if you want to help improve it, just let a comment or you can send me a email on walkernagato@gmail.com.</p>
      <a class="btn btn-primary btn-lg" href="{{ route('post.index')}}" role="button">Popular Posts</a>
      </div>
    </div>
  </div>

@foreach($post as $rowPost)
    <div class="row">
    <div class="col-md-8">
      <div class="post">
        <h3 style="font-weight:bold">{{ $rowPost->title}}</h3>
        <p>{{substr($rowPost->description,0,350)}}{{ (strlen($rowPost->description)>350)? "..." : ""}}</p>
      </div>
    <a href="{{ route('comment.show',$rowPost->id)}}" class="btn btn-primary">Read</a>
      </div>

      <div class="col-md-4">
          <h3>Side-Bar</h3>
      </div>
    </div><!--END of the row-->
    <div class="space"></div>
@endforeach

</div><!--END of the Containner*-->
<hr><br>
@endsection