@extends('main')

@section('title')
<title> All Categories </title>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Categories</h1>
               
                <table class='table'>
                    <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                   </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->name_category}}</td>
                                <td>
                {!! Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'DELETE']) !!}
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
                    {!! Form::open(['route'=>'categories.store','method'=>'POST','class'=>'form-control MyFormSearch']) !!}
                    
                    <h2>New Category</h2>
                    {!! Form::label('name_category','Name') !!}
                    {!! Form::text('name_category',null,['class'=>'form-control']) !!}
                    <br>
                    {!! Form::submit('New',['class'=>'btn btn-info btn-block']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop
