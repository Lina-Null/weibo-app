<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        $user = User::create([
            'name' => $req->name,
            'email'=> $req->email,
            'password'=>bcrypt($req->password),
            'password_show' =>  $req->password
        ]);
        Auth::login($user);    
        session()->flash('success','欢迎，您将在这里开启一段新的旅程');
        return redirect()->route('users.show',[$user]);
    }
}
