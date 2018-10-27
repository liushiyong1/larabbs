<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','introduction','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * 用户模型与话题模型关联，一对多，一个用户可以有多个话题
     * 用户一下函数关联之后，可以使用 $user->topics(),取出用户发布的所有话题数据
     * */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function isAuthorOf($model){
        return $this->id == $model->user_id;

    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
