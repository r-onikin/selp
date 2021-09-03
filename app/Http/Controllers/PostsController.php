<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; //追加

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            // （後のChapterで他ユーザの投稿も取得するように変更しますが、現時点ではこのユーザの投稿のみ取得します）
            $posts = $user->feed_posts()->orderBy('created_at', 'desc')->paginate(10);
            
            $goals = $user->goals()->orderBy('created_at', 'desc')->get();
            $data = [
                'user' => $user,
                'posts' => $posts,
                'goals' => $goals,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);
        $image_path = null;
        
        // dd($request->file('image'));
        // もしimageフィールドにセットされていたら以下を実行
        if($request->hasFile('image') && $request->file('image')->isValid()){

            //s3アップロード開始
            $image = $request->file('image');
            // バケットの`selp-backet`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('selp-backet', $image, 'public');
            // アップロードした画像のフルパスを取得
            $image_path = Storage::disk('s3')->url($path);
        }

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->posts()->create([
            'content' => $request->content,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'image_path' => $image_path,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $post = \App\Post::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
    

    
    public function show($id)
    {
        // ヌルなら表示しない
        // idの値で投稿を検索して取得
        $post = \App\Post::findOrFail($id);

        return view('posts.show', ['post' => [
            'lat' => $post->lat,
            'lng' => $post->lng,
        ]]);
    }
}
