@extends('layouts.app')

@section('content')

    <!--修正をやめてトップページへ戻る-->
    <div class="d-flex flex-row">
        <div class="justify-content-start">   
            <a href="{{ route('users.show',  ['user' => Auth::id()]) }}">
                <button type="button" class="btn btn-link">
                    <i class="fas fa-arrow-left" style="color:blue; font-size:20px;"></i>
                </button>
            </a> 
        </div>
        
        <div class="justify-content-center">
            <h2>Goal編集ページ</h2>
        </div>
    </div>
    
        <div class="row mt-5">
            <div class="col-6">
                {!! Form::model($goal, ['route' => ['goals.update', $goal->id], 'method' => 'put']) !!}
    
                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    
                     <div class="form-group">
                        {!! Form::label('content', 'Content:') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control','rows' => '2']) !!}
                    </div>
    
                    {!! Form::submit('edit', ['class' => 'btn btn-primary mr-3']) !!}
                    
                    {{-- Goal削除フォーム --}}
                    {!! Form::model($goal, ['route' => ['goals.destroy', $goal->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
    
                {!! Form::close() !!}
            </div>

        </div>
@endsection

