@extends('main')

@section('titre')
    <title> edit tag</title>
@endsection

@section('content')
<!-- Si il affiche une erreu avec no message alors il y a une erreur dans le code html qui affecte la requet -->
    {!! Form::model($tag,array('route'=>['tag.update',$tag->id],'method'=>'PUT')) !!}

        {{ Form::label('name_tag','Tag',['class'=>'label h1'])}}
        {{ Form::text('name_tag',null,['class'=>'form-control'])}}
        <!-- il doit avoir le meme nom que la column de la table de la database meme chose pour le label-->
        <br>
        {{ Form::submit('submit',['class'=>'btn btn-success'])}}
    {!! Form::close()!!}
    <hr>
    <br>

@stop