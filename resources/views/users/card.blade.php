
@if (Auth::id() == $user->id)
    <!--プロフィール編集ページ-->
    <div class="mb-1" style="text-align: right">
        {!! link_to_route('users.bioEdit', 'Edit Profile', [], ['class' => 'btn btn-outline-primary']) !!}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>

    <div class="card-body text-center">
            @if (empty($user->image_path))
               {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 200]) }}" alt="">
            @else
                <img style="width:300px" class="rounded img-fluid" src="{{ $user->image_path }}" alt="">
            @endif
    </div>

    <div class="card-body text-left">
        <p class="card-bio">{!! nl2br(e($user->bio)) !!}</p>
    </div>
    {{-- フォロー／アンフォローボタン --}}
    @include('user_follow.follow_button')
</div>

