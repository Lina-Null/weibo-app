<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;

class UserController extends Controller
{
    //
    public function create(){
        return view('users.create');
    }

    //
    public function show(UserModel $user){
        //dump($user);
        return view('users.show',compact('user'));
    }
}
