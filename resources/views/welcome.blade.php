@extends('layouts.top')

@section('content')
    @if (Auth::check())
        <div class="row pt-4">
            <aside class="col-lg-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-lg-8">
                {{-- Goalフォーム --}}
                @include('goals.index')
                {{-- 投稿フォーム --}}
                @include('posts.form')
                {{-- 投稿一覧 --}}
                @include('posts.posts')
            </div>
        </div>
    @else
    <div class="top_content">
        <div class="background">
            <div class="text-center pt-5">
                <h1 class=mb-3>Welcome to the Selp</h1>
                <h2 class=mb-5>~Let's share your goals and posts to improve yourself~</h2>
                <h3 class=mb-3>About</h3>
                <p>市場価値を高めたい人材が自己研鑽をシェアし、</p>
                <p>高め合うサービスです。</p>
                <P>頑張りたいけど、モチベーションが続かない。</P>
                <P>一人では、サボってしまう。</P>
                <P>そんな悩みを解決できれば良いなと思い</P>
                <P class=mb-5>このサービスを作りました。</P>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    </div>
    @endif
@endsection



