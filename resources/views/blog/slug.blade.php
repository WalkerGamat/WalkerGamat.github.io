@extends('main')

@section('title')

@section('title')
    <title>
        Slugs
    </title>
@endsection

@section('content')
<div class="container">
   <div class="row" style="margin:10px">
        <div class="col-md-8 col-md_offset-2">
            <h1> {{ $post->title }}</h1>
            <br>
            <p> {{ $post->description }} </p>
        </div>
    </div>
</div>

@endsection