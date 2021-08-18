<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal; // 追加
use App\Http\Controller\Auth;

class GoalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $goals = $user->goals()->orderBy('created_at', 'desc');

            $data = [
                'user' => $user,
                'goals' => $goals,
            ];
        }
        
        // メッセージ一覧ビューでそれを表示
        return view('goals.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  Goal作成ビュー
    public function create()
    {
        $goal = new Goal;
        
        return view('goals.create',[
            'goal' => $goal,
        ]);
    }
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      // postでgoals/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        
        //バリデーション
        $request->validate([
            'title' => 'required',
            'content' => 'required|max:30',
        ]);
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->goals()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // ユーザートップへリダイレクトさせる
        return redirect()->route('users.show', ['user'=>\Auth::id()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値でgoalを検索して取得
        $goal = Goal::findOrFail($id);

        // goal編集ビューでそれを表示
        if (\Auth::id() === $goal->user_id) {
            return view('goals.edit', [
                'goal' => $goal,
            ]);
        }

         // 前のURLへリダイレクトさせる
        return back();;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // idの値でメッセージを検索して取得
        $goal =  Goal::findOrFail($id);
        
        // メッセージを更新
        if (\Auth::id() === $goal->user_id) {
            $goal->title = $request->title;
            $goal->content = $request->content;
            $goal->save();
        }
        // ユーザートップへリダイレクトさせる
        return redirect()->route('users.show', ['user'=>\Auth::id()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値でgoalを検索して取得
        $goal = Goal::findOrFail($id);
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $goal->user_id) {
            $goal->delete();
        }

        // ユーザートップへリダイレクトさせる
        return redirect()->route('users.show', ['user'=>\Auth::id()]);
    }
}
