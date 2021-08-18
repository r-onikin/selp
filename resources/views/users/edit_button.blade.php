<!--editボタンのフォーム-->
{!! Form::open(['route' => ['user.follow', $user->id]]) !!}
    {!! Form::submit('Edit profile', ['class' => "btn btn-primary btn-block"]) !!}
{!! Form::close() !!}