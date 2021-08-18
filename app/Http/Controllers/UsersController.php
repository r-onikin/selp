<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User; // 追加
use App\Goal; // 追加
use Illuminate\Support\Facades\Storage; //追加

class UsersController extends Controller
{
    public function index()
    {

        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザの投稿一覧を作成日時の降順で取得
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
        
        $goals = $user->goals()->orderBy('created_at', 'desc')->get();

        // ユーザ詳細ビューでそれらを表示
        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
            'goals' => $goals,
        ]);
    }
    
    /**
     * ユーザのフォロー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);

        // フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
    
    /**
     * ユーザのフォロワー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    /**
     * ユーザのお気に入りー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function favoriting($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのお気に入り一覧を取得
        $favorites = $user->favorites()->paginate(10);

        // お気に入り一覧ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'posts' => $favorites,
        ]);
    }
    
    // 自己紹介の写真とbioの編集フォーム
    public function bioEdit()
    {
        // 認証済みユーザ（閲覧者）を取得
        $user = \Auth::user();
        
        return view('users.edit_profile',[
                'user' => $user,
        ]);
    }
    
    // プロフィールの保存
    public function bioUpdate(Request $request)
    {
        $user=\Auth::user();
        
        // dd($request->file('image'));
        // もしimageフィールドにセットされていたら以下を実行
        if($request->hasFile('image') && $request->file('image')->isValid()){
            //s3アップロード開始
            $image = $request->file('image');
            // バケットの`selp-backet`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('selp-backet', $image, 'public');
            // アップロードした画像のフルパスを取得
            $user->image_path = Storage::disk('s3')->url($path);
        }
        
        $user->bio = $request->bio;
        $user->save();
        
        // ユーザートップへリダイレクトさせる
        return redirect()->route('users.show', ['user'=>Auth::id()]);
    }
    
}
