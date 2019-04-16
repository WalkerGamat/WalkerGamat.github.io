@extends('main')

@section("title")
        <title>Edit Post</title>
@endsection

@section('style')
  <link rel="stylesheet" href="/css/select2.css">
@endsection

@section("content")

<div class="container">
    <br>
    <div class="row">
        
        <div class="col-md-8">
{!! Form::model($post, ['route' => ['post.update',$post->id], 'method' => 'PUT'])!!}
        <label for="title">Title</label>
        {{Form::text('title', null, ['class' => 'form-control'])}}
        <br>
        <label for="slug">Slug</label>
        {{Form::text('slug', null, ['class' => 'form-control'])}}
        <br>
        <label for="category">Category:</label>
        {{ Form::select('category_id',$categories, null, ['class'=>'form-control'])}}
        <!-- c'est la seul manier qui fonction pour l'instant je pense a cause de form biding-->
        <br>
        <label for="tag">Tag:</label>
        {{ Form::select('tags[]',$tags, null, ['class'=>'form-control' , 'multiple'=>'multiple'])}}
        <br>
        <label for="description">Body</label>
        {{Form::textarea('description', null, ['class' => 'form-control'])}}
    </div>
        
<div class="col-md-4">
    <div class="well">
        <dl class="dl-horizontal">
        <dt>Created At:</dt>
        <dd>{{ date('M j, Y h i a',strtotime($post->created_at)) }}</dd>
    </dl>

        <dl class="dl-horizontal">
            <dt>Updated At:</dt>
            <dd>{{ date('M j, Y h i a',strtotime($post->updated_at)) }}</dd>
        </dl>
        <hr>

        <div class="row">
            <div class="col-sm-6">
        {{Form::submit('Save',['class'=>'btn btn-success btn-block'])}}
                
            </div>
            <div class="col-sm-6">
                <a href="{{route('post.show',$post->id)}}" class="btn btn-danger btn-block">Cancel</a>
            </div>
         </div>

    </div>
    </div>
    {!! Form::close()!!}
    </div>
     <br>
</div>
@endsection

@section('script')

<script type="text/javascript" src="/js/select2.full.min.js"></script>

@endsection