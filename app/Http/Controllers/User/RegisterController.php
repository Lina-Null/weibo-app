<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function signup(){
        return view('register/register');
    }

    public function regEmail(Request $req){
        $this->validate($req,[
            'name' => 'required|unique:users|min:3|max:50',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|confirmed|min:6'
        ]);

    }
}
