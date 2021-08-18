@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-lg-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-lg-8">
            {{-- タブ --}}
            @include('users.navtabs')
            {{-- ユーザ一覧 --}}
            @include('users.users')
        </div>
    </div>
@endsection