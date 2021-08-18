<h2 style="margin-bottom: 10px;">Goals</h2>
@if (Auth::id() == $user->id)
    <!--新規作成ボタン-->
    {!! link_to_route('goals.create', 'Create New Goals', [], ['class' => 'btn btn-outline-primary']) !!}
@endif
    <div style="margin-top: 10px;">
        @if (count($goals) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                    </tr>
                </thead>
                    @foreach ($goals as $goal)
                    <tr>
                        {{-- Goal編集ページへのリンク --}}
                        @if (Auth::id() == $user->id)
                            <td>{!! link_to_route('goals.edit', $goal->title, ['goal' => $goal->id],) !!}</td>
                        @else
                            <td class="font-weight-bold">{{ $goal->title }}</td>
                        @endif
                            <td  style="width: 70%;">{{ $goal->content }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
