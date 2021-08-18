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
            {{-- お気に入り一覧 --}}
            @include('posts.posts')
        </div>
    </div>
@endsection