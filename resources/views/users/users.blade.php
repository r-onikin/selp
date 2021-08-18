@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                
                @if (empty($user->image_path))
                    <!--ダミーを表示-->
                    <img style="width:70px" class="rounded img-fluid" src="{{ asset('avatar_96675.png') }}" alt="">
                @else
                    <img style="width:75px" class="rounded img-fluid" src="{{ $user->image_path }}" alt="">
                @endif
                
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'View profile', ['user' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif