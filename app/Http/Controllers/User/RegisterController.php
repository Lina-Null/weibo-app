<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest',[
            'only' => ['signup']
        ]);
        $this->middleware('throttle:10,60',[
            'only' => ['regEmail']
        ]);
    //     $this->middleware('auth',[
    //         'except'=>['confirmEmail']
    //     ]);
     }
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
        $this->sendEmailConfirmationTo($user);
        //Auth::login($user);    
        session()->flash('success','验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
    }
    protected function sendEmailConfirmationTo($user){
        $view = 'emails.confirm';
        $data = compact('user');
        //$from = '764662030@qq.com';
        //$name = 'lina';
        $to = $user->email;
        $subject = '感谢注册weibo-app应用！请确认你的邮箱！';
        Mail::send($view, $data, function ($message)use($to,$subject) {
            $message->to($to)->subject($subject);
        
        });

    }
    public function confirmEmail($token){
        $user = User::where('activation_token',$token)->firstOrFail();
        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success','恭喜你，激活成功!');
        return redirect()->route('users.show',[$user]);
    }
}
