@extends('main')

@section('titre')
    <title>index</title>
@endsection

@section("content")

<div class='row btn-spacing'>
            <div class="col-md-10">
                    <h1> All My Posts</h1>
            </div>

            <div class="col-md-2">
                    <a href="{{ route('post.create') }}" class="btn btn-block btn-primary btn-post">Create New Post</a>
            </div>
</div>
<br>
<div class='row'>

        <div class="col-md-12">
                <table class="table">
                <thead>
                        <th>#</th>                
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created At</th>
                        <th>Options</th>
                </thead>
                <tbody>
                @foreach($post as $rowPost)
                        <tr>
                        <th>{{$rowPost->id}}</th>
                        <td>{{$rowPost->title}}</td>
                        <td>{{substr($rowPost->description,0,50)}}{{ (strlen($rowPost->description)>50)? "..." : ""}}</td>
                        <td>{{ $rowPost->created_at}}</td>
                        <td>
                        <a href="{{ route('post.show',$rowPost->id) }}" class="btn btn-default btn-sm">View</a>
                        <a href="{{ route('post.edit',$rowPost->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                        </tr>
                
                @endforeach
                </tbody>
                 </table>
     </div>
        <div class="text-center" style="align-item:center">
                {!! $post->links(); !!}
        </div>
<hr>
</div>
@stop