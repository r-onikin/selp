@extends('layouts.app')
@section('content')

    <!--作成をやめてトップページへ戻る-->
    <div class="d-flex flex-row">
        <div class="justify-content-start">   
            <a href="{{ route('users.show',  ['user' => Auth::id()]) }}">
                <button type="button" class="btn btn-link">
                    <i class="fas fa-arrow-left" style="color:blue; font-size:20px;"></i>
                </button>
            </a>
        </div>
        
        <div class="justify-content-center">
            <h4>Goal作成ページ</h4>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-6">
            {!! Form::model($goal, ['route' => 'goals.store']) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('content', 'Contet:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                

                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection