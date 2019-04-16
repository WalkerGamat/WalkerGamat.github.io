@extends('main')

@section('title')
        <title> Edit Comment</title>
@endsection

@section('content')
<div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="space-down"></div>
                <h3 class="h3 titre">Edit Comment</h3>
                {{Form::model($comment,['route'=>['comment.update',$comment->id],'method'=>'PUT'])}}
                
                <div class="space-down"></div>
                {{Form::label('name','Name')}}        
                {{Form::text('name',null, ['class'=>'form-control','disabled'=>''])}}
                
                <div class="space-down"></div>
                {{Form::label('email','Email')}}
                {{Form::text('email',null, ['class'=>'form-control', 'disabled'=>''])}}
                
                <div class="space-down"></div>
                {{Form::label('comment','Comment')}}
                {{Form::textarea('comment',null,['class'=>'form-control'])}}
                
                <div class="space-down"></div>
                {{Form::submit('Update',['class'=>'btn btn-block btn-success'])}}
                <div class="space-down"></div>
                
                {{Form::close()}}
        </div>
</div>
@stop