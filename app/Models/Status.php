<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\User;
class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'content'
    ];
    //一条微博只属于一个用户
    public function user(){
        return $this->belongsTo(User::class);
    }
}
