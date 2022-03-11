<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;  //邮箱认证
use Illuminate\Database\Eloquent\Factories\HasFactory; //模型工厂相关功能的引用
use Illuminate\Foundation\Auth\User as Authenticatable; // 授权相关的功能引用
use Illuminate\Notifications\Notifiable;  //消息通知相关的功能引用
use Laravel\Sanctum\HasApiTokens;  //API令牌修改功能

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password_show',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'password_show',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     * $casts 熟悉是用来指定数据库字段使用的数据类型
     */
    protected $casts = [
        //指定 email_verified_at 的数据类型是 datetime 
        //created_at 和 updated_at 的数据类型也是 datetime
        'email_verified_at' => 'datetime',
    ];


    //获取用户头像
    /*
    public function gravatar($size = 100){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://cdn.v2ex.com/gravatar/$hash?s=$size";
    }
    */
}
