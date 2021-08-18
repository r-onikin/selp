<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['title', 'content'];
    
    /**
     * このGoalを所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
