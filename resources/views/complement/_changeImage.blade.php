
    
    {!! Form::model($user,array('route'=>['profile.showProfile',$user->id],'method'=>'PUT','files'=>'true')) !!}
    {{ Form::submit('Changer Image',['class'=>'btn btn-info'])}}
    {!! Form::close()!!}

