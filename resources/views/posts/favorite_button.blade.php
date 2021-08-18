@if (Auth::user()->is_favoriting($post->id))
    {{-- アンフェイバリットーボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
        <button type="submit" class="btn btn-link">
            <i class="fas fa-heart" style="color:red"></i>
        </button>
        <span class="badge badge-secondary">{{ $post->favorites_count }}</span>
    {!! Form::close() !!}
@else
    {{-- お気に入りボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
        <button type="submit" class="btn btn-link">
            <i class="far fa-heart"></i>
        </button>
        <span class="badge badge-secondary">{{ $post->favorites_count }}</span>
    {!! Form::close() !!}
@endif
