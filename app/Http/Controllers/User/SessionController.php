<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SessionController extends Controller
{

    public function __construct(){
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }

    //显示登录页
    public function create(){
        if(Auth::check()){
            return redirect()->route('index');
        }else{
            return view('session.create');
        }

    }

    //登录
    public function store(Request $req){
        $credentials = $this->validate($req,[
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials,$req->has('remember'))){
            //登录成功后的相关操作
            if(Auth::user()->activated){
                session()->flash('success','欢迎回来');
                $fallback = route('users.show',Auth::user());
                return redirect()->intended($fallback);
            }else{
                
                Auth::logout();
                session()->flash('warning',"您的帐号未激活，请检查邮箱中的注册邮件进行激活！");
                return redirect("/");
            }
            
           // return redirect()->route('users.show',[Auth::user()]);
        }else{
            //登录失败后的相关操作
            session()->flash('danger','很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }

       // return;

    }

    //退出
    public function destory(){
        Auth::logout();
        session()->flash('success',"您已成功退出！");
        return redirect('login');
    }
}
