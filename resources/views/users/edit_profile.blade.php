@extends('layouts.app')

@section('content')
    <!--修正をやめてトップページへ戻る-->
    <div class="d-flex flex-row">
        <div class="justify-content-start">   
            <a href="{{ route('users.show',  ['user' => Auth::id()]) }}">
                    <i class="fas fa-arrow-left" style="color:blue; font-size:20px;"></i>
            </a> 
        </div>
        
        <div class="justify-content-center ml-2">
            <h4>Edit Profile</h4>
        </div>
    </div>
    
    
    <!--selfieの編集フォーム-->
    <h4 class=mt-5 style="color:grey">Selfie</h4>
    <div class=mt-3>
        @if (empty(Auth::user()->image_path))
         {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
            <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 150]) }}" alt="">
        @else
            <img style="width:150px" class="rounded img-fluid" src="{{ Auth::user()->image_path }}" alt="">
        @endif
    </div>
    
    <p class=mt-4>写真を変更する場合は、下記より写真を追加</P>
    <form action="{{ action('UsersController@bioUpdate') }}" method="post" enctype="multipart/form-data">
        <!-- アップロードフォームの作成 -->
        <input type="file" name="image">
        
        <!--bioの編集フォーム-->
        <h4 class=mt-5 style="color:grey">Bio</h4>
        
        {!! Form::textarea('bio', null,['placeholder' => 'Please write your self introduction.', 'class' => 'form-control', 'rows' => '2']) !!}
        {{ csrf_field() }}
        <div class=mt-4>
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    </form>
  
@endsection

