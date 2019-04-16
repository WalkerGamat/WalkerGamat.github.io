@extends('main')

@section('title')
<title> Edit Profile</title>
@endsection

@section('content')

<div class="row">
<div class="col-md-12">
    
    {!! Form::model($user,array('route'=>['profile.update'],'method'=>'PUT', 'files'=>'true')) !!}
    <span class="fa fa-user fa-4x">    
        {{ Form::label('name','Full Name',['class'=>'label h1 space-up'])}}
    </span>
    {{ Form::text('name',null,['class'=>'form-control space-down'])}}
    
    {{ Form::label('email','Email', ['class'=>'fa fa-envelope'])}}
    {{ Form::text('email',null,['class'=>'form-control space-down'])}}
    
    <div class="row">
        <div class="col-lg-offset-1 col-lg-12">

            {{ Form::label('location', 'Location', ['class'=>'fa fa-map-marker'])}}
            {{ Form::text('location',null,['class'=>'space-down'])}}
            
            {{ Form::label('city','City',  ['class'=>'fa fa-map-marker'])}}
            {{ Form::text('city', null, ['class'=>'space-down'])}}
            
            {{ Form::label('state','State',  ['class'=>'fa fa-map-marker'])}}
            {{ Form::text('state', null,['class'=>'space-down'])}}
        </div>
    </div>
    
    {{ Form::label('company','Company', ['class'=>'fa fa-briefcase'])}}
    {{ Form::text('company', null, ['class'=>'form-control space-down'])}}
    
    {{ Form::label('github','Github', ['class'=>'fa fa-github'])}}
    {{ Form::text('github', null, ['class'=>'form-control space-down'])}}
    
    <div class="row">
            <div class="col-lg-offset-1 col-lg-12">

        {{ Form::label('facebook','Facebook', ['class'=>'fa fa-facebook-square'])}}
        {{ Form::text('facebook', null, ['class'=>'space-down'])}}
        
        {{ Form::label('twitter', 'Twitter', ['class'=>'fa fa-twitter'])}}
        {{ Form::text('twitter', null, ['class'=>'space-down'])}}
        
    </div>
</div>
{{Form::label('image', 'Upload',['class'=>'fa fa-upload space-down'])}}
{{ Form::file('upload')}}
    
    <!-- il doit avoir le meme nom que la column de la table de la database meme chose pour le label-->
    <br>
    {{ Form::button('submit',['class'=>'fa fa-ok btn btn-success btn-block space-down'])}}
    {!! Form::close()!!}
</div>
</div>

@stop