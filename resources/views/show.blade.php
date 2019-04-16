@extends('main')

@section("title")
        <title>Read Post</title>
@endsection

@section("content")

<div class="container">
    <br>
    <div class="row">

    <div class="col-md-8">
        <h1><?php echo $post->title ?></h1>
        <div class="lead"> {{ $post->description }} </div>        
        <hr>
        <div class="tags">
            @foreach($post->tags as $tag)
            <a href='{{route('tag.show',$tag->id)}}' class="label btn btn-sm btn-secondary">{{ $tag->name_tag }}</a>
            @endforeach
        </div>
<br/>
<h3><i class='fa fa-comment-alt'></i> Comments
    <span class="info-comment">{{$post->comment()->count()}}</span></h3>
        <table class="table">
            <thead>
            
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th>option</th>
    
            </thead>
            <tbody>
                @foreach($post->comment as $comment)
            <tr>
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>
                    <a href="{{ route('comment.edit',$comment->id) }}" class="btn btn-xs btn-primary fa fa-pencil"></a>
                    <a href="{{route('comment.delete',$comment->id)}}" class="btn btn-xs btn-danger fa fa-trash"></a>
                    </td>
            </tr>
                @endforeach
            </tbody>
    </table>
    
    </div>
<div class="col-md-4">
    <div class="well form-control">
        <dl cl&ss="dl-horizontal">
            <dt>URL:</dt>
            <dd><a href= "{{ url('/blog/'.$post->slug) }}" > {{url('/blog/'.$post->slug)}} </a></dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Category:</dt>
            <dd>{{ $category->name_category }}</dd>
        </dl>
        <dl class="dl-horizontal">
        <dt>Created At:</dt>
        <dd>{{ date('M j, Y h i a',strtotime($post->created_at)) }}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Updated At:</dt>
            <dd>{{ date('M j, Y h i a',strtotime($post->updated_at)) }}</dd>
        </dl>
        <hr>

        <div class = "row">
            <div class="col-sm-6">
       {!! Html::linkRoute('post.edit','Edit', [$post->id], ['class' => 'btn btn-info btn-block'])!!}
            </div>
            <div class="col-sm-6">
                {!! Form::open(['route'=>['post.destroy',$post->id], 'method'=>'DELETE']) !!}
                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])!!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm-12" style="margin-top:10px">
        {!! Html::linkRoute('post.index','<<Show All Post', null , ['class' => 'btn btn-block', 'style'=>'border:1px solid black;'])!!}
        </div>
    </div>
</div>
    </div>
    
     <br>
</div>

@endsection


