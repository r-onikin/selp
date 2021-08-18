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
            <h2>Goal編集ページ</h2>
        </div>
    </div>
    
        <div class="row mt-5">
            <div>
                {!! Form::model($goal, ['route' => ['goals.update', $goal->id], 'method' => 'put']) !!}
    
                    <div class="form-group">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    
                     <div class="form-group">
                        {!! Form::label('content', 'Content:') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control','rows' => '2']) !!}
                    </div>
                    {!! Form::submit('update', ['class' => 'btn btn-primary mr-3']) !!}
                    <button type="button" onclick="javascript:document.getElementById('deleteForm').submit()" class="btn btn-danger">Delete</button>
                 
                {!! Form::close() !!}
               
                
                
                {{-- Goal削除フォーム --}}
                {!! Form::model($goal, ['route' => ['goals.destroy', $goal->id], 'method' => 'delete', 'id' => 'deleteForm']) !!}
                {!! Form::close() !!}
    
            </div>
        </div>
@endsection

