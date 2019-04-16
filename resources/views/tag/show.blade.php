@extends('main')

@section('title0')
    <title>{{$tag->name_tag}}</title>
@endsection

@section('content')
<br>  
<div class="row">
    <div class="col-md-10">
        <h1 class="h1"> {{ $tag->name_tag }} tag<small class="h4"> {{$tag->posts()->count()}} Posts</small> </h1>
    </div>
    <div class="col-md-1">
        <a href="{{ route('tag.index') }}" class="btn btn-info">All Tags</a>
    </div>
    <div class="col-md-1">
            {!! Form::open(['route'=>['tag.destroy', $tag->id], 'method'=>'DELETE']) !!}
            {!! Form::submit('Delete', ['class'=>'btn btn-danger'])!!}
            {!! Form::close() !!}    
    </div>
</div>
    <div class="conatainer">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tag</th><!-- chaque post a plusieur tags -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($tag->posts as $post)
                    <tr>
                 <td>{{$post->id}}</td>
                 <td>{{$post->title}}</td>
                    <td>
                        @foreach($post->tags as $Atag)
                    <a href='{{route('tag.edit',$Atag->id)}}' class="label btn btn-sm btn-secondary">{{$Atag->name_tag}}</a>
                        @endforeach
                    </td>
                    <td>
                    <a href="{{route('post.show',$post->id)}}" class="btn btn-default btn-xs" style='border:1px solid gray'>view</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection