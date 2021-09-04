<div class="mt-3" style="position: relative;">
@if (count($posts) > 0)
    <ul class="list-unstyled">
        @foreach ($posts as $post)
            @php
                $post->loadRelationshipCounts();
            @endphp
            <li class="media mb-3">
            @if (empty($post->user->image_path))
                 {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 100]) }}" alt="">
            @else
                <img style="width:100px" class="rounded img-fluid" src="{{ $user->image_path }}" alt="">
            @endif
                <div class="media-body ml-2">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id]) !!}
                        <span class="text-muted">posted at {{ $post->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <img style="width:200px;" class="rounded img-fluid" src="{{ $post->image_path }}" alt="">
                        <p class="mb-0">{!! nl2br(e($post->content)) !!}</p>
                    </div>
                    <!--位置情報詳細ページへのリンク-->
                    @if(!empty($post->lat))
                        <div style="display:inline-block;">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                            <i class="fas fa-map-marked-alt"></i>
                        </a> 
                        </div>
                    @endif
                    <div style="display:inline-block;">
                    {{-- お気に入り／アンファボリットーボタン --}}
                    @include('posts.favorite_button')
                    </div>
                    <div style="display: inline-block; margin-left: 15px;">
                        @if (Auth::id() == $post->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <div style="position: absolute; right: 50%;">
    {{-- ページネーションのリンク --}}
    {{ $posts->links() }}
    </div>
@endif
</div>