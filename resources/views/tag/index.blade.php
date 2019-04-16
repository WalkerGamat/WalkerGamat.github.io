@extends('main')

@section('title')
<title> All Tags </title>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Tags</h1>
               
                <table class='table'>
                    <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                   </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <th>{{ $tag->tag_id }}</th>
                                <td>{{ $tag->name_tag}}</td>
                                <td>
                <a href="{{ route('tag.show',$tag->id) }}" class="btn btn-info btn-block">View</a>
                                </td>
                                <td>
                {!! Form::open(['route'=>['tag.destroy', $tag->id], 'method'=>'DELETE']) !!}
                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])!!}
                {!! Form::close() !!}
                                </td>
                            </tr>
                            <!-- route('categories.destroy') -->
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <div class="well">
                    {!! Form::open(['route'=>'tag.store','method'=>'POST','class'=>'form-control MyFormSearch']) !!}
                    
                    <h2>New Tag</h2>
                    {!! Form::label('name_tag','Name') !!}
                    {!! Form::text('name_tag',null,['class'=>'form-control']) !!}
                    <br>
                    {!! Form::submit('New',['class'=>'btn btn-info btn-block']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop
