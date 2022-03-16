<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class PasswordController extends Controller
{
    public function __construct(){
        $this->middleware(
            'throttle:3,10',[
                'only' => ['sendResetLinkEmail']
            ]
        );
    }
    //
    public function showLinkRequestForm(){
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $req){
        //验证邮箱
        $req->validate(['email' => 'required|email']);
        $email = $req->email;
        //根据邮箱找用户
        $user = User::where('email',$email)->first();
        //如果$user 不存在
        if(is_null($user)){
            session()->flash('danger','邮箱未注册');
            return redirect()->back()->withInput();
        }

        // 生成token 会在视图emails.reset_link里拼接链接
        $token = hash_hmac('sha256',Str::random(40),config('app.key'));

        //入库 使用updateOrInsert来保持email唯一性

        DB::table('password_resets')->updateOrInsert(
            ['email' => $email],
            [
                'email' => $email,
                'token' => Hash::make($token),
                'created_at' => new Carbon
            ]
        );

        // 将Token链接发送给用户
        Mail::send('emails.reset_link',compact('token'),function($message) use ($email){
            $message->to($email)->subject('忘记密码');
        });

        session()->flash('success','重置邮件发送成功，请查收');
        return redirect()->back();
    }

    public function showResetForm(Request $req){
        $token = $req->route()->parameter('token');
        return view('auth.passwords.reset',compact('token'));
    }

    public function reset(Request $req){
        //1.验证数据是否合规
        $req->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);
        $email = $req->email;
        $token = $req->token;
        //找回密码链接的有效时间
        $expires = 60 * 10;
        //2. 获取对应用户
        $user = User::where('email',$email)->first();
        //3. 如果不存在
        if(is_null($user)){
            session()->flash('danger','邮箱未注册');
            return redirect()->back()->withInput();
        }
        //4. 读取重置的记录
        $record = (array)DB::table('password_resets')->where('email',$email)->first();

        //5. 记录存在
        if($record){
            //5.1检查是否过期
            if(Carbon::parse($record['created_at'])->addSeconds($expires)->isPast()){
                session()->flash('danger','链接已过期，请重新尝试');
                return redirect()->back();
            }

            //5.2 检查是否正确
            if(!Hash::check($token,$record['token'])){
                session()->flash('danger','令牌错误');
                return redirect()->back();
            }

            //5.3 一切正常，更新用户密码
            $user->update([
                'password' => bcrypt($req->password),
                'password_show' => $req->password
            ]);

            //5.4 提示用户更新
            session()->flash('success','密码重置成功，请使用新密码登录！');
            return redirect()->route('login');
        }

        //6. 记录不存在
        session()->flash('danger','未找到重置记录');
        return redirect()->back();

    }
}
