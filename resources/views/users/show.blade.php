@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <aside class="col-lg-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-lg-8 mt-4">
                {{-- Goalフォーム --}}
                @include('goals.index')
                <div class=mt-3>
                    {{-- タブ --}}
                    @include('users.navtabs')
                    @if (Auth::id() == $user->id)
                        {{-- 投稿フォーム --}}
                        @include('posts.form')
                    @endif
                    {{-- 投稿一覧 --}}
                    @include('posts.posts')
                </div>
            </div>
        </div>
    </div>
@endsection