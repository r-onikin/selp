@if (Auth::id() != $user->id)
    @if (Auth::user()->is_following($user->id))
        <div class="mb-1" style="text-align: right;">
            {{-- アンフォローボタンのフォーム --}}
            {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('Unfollow', ['class' => "btn btn-danger"]) !!}
            {!! Form::close() !!}
        </div>
    @else
        {{-- フォローボタンのフォーム --}}
        <div class="mb-1" style="text-align: right;">
            {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
                {!! Form::submit('Follow', ['class' => "btn btn-primary"]) !!}
            {!! Form::close() !!}
        </div>
    @endif
@endif