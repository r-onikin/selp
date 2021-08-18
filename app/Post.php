<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'image_path', 'lat', 'lng'];
    
    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このPostが持っているfavorite。（ Favoriteモデルとの関係を定義）
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    /**
     * この投稿に関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount(['favorites']);
    }
    
}
