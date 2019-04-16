@extends('main')

@section('title')
    <title>Single</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-offset-2 icocomment">
        @if($post->image!= null)
            <img src="{{ asset('img/'. $post->image)}}"/>
        @endif    
            <h1> {{ $post->title }} </h1>
            <p>  {{ $post->description }}   </p>
        <hr>
        </div>
    </div>
    <br>
    @if($post->comment()->count()!= 0)
    <div class="row">
        <div class="col-md-6 col-md-offset-3 icocomment">
            <h3><i class='fa fa-comment-alt'></i> Comments
                <span class="info-comment">{{$post->comment()->count()}}</span></h3>
                <?php /*$post->comment et le meme pour que selui du Model Post*/ ?>
        @foreach($post->comment as $comment)
            <div class="comment">
                <div class="author-content">
        <img src={{'https://www.gravatar.com/avatar/'.md5(strtolower(trim($comment->email)))
    .'?d=retro'}} class="author-img" />
                    <div class="author-name">
                        <h4>{{ $comment->name }}:</h4>
                        <p class="author-date">
                            {{ $comment->created_at }}
                        </p>
                    </div>
                </div>
                <div class="comment-content">    
                        {{ $comment->comment }}
                </div>        
                <div class="space-down"></div>                
            </div>
            @endforeach
        </div>
        <div class="space-down"></div>
    </div>
    <hr>
    <br>
    @endif
<div class="row">
    <div id='comment-form' class="col-md-8 col-md-offset-2 icocomment">
                {{Form::open(["route"=>["comment.store", $post->id] ,'methode'=>'POST', 'class'=>'row'])}}
            <input type="hidden" name="id" value='{{ $post->id }}'/>
            <input type="hidden" name="user" value='{{ Auth::id() }}'/>

            <div class="col-md-12">
                {{Form::label('name','Name',['class'=>'space'])}}
                {{Form::text('name',null,['class'=>'form-control'])}}
            </div>
            <div class="col-md-12">
                {{Form::label("comment",'Comment',['class'=>'space'])}}
                {{Form::text('comment',null,['class'=>'form-control'])}}
            </div>
            <div class="col-md-12">
                {{Form::submit('Envoyer',['class'=>'form-control btn-block btn-success space'])}}
                {{Form::close()}}
            </div>
            <div class="space-down"></div>

        </div>
    </div>
@stop
