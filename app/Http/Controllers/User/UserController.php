<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth',[
            'except' => ['show','create','store','index']
        ]);
    }
    public function index(){
        $users = UserModel::paginate(6);
        return view('users.index',compact('users'));
    }

    //
    public function create(){
        return view('users.create');
    }

    //
    public function show(UserModel $user){
        //dump($user);
        $statuses = $user->statuses()
                    ->orderBy('created_at','desc')
                    ->paginate(10);
        return view('users.show',compact('user','statuses'));
    }

    //编辑个人资料
    public function edit(UserModel $user){
        $this->authorize('update', $user);
        return view('users.edit',compact('user'));
    }
    
    public function update(UserModel $user,Request $req){
        $this->authorize('update', $user);
        $this->validate($req,[
            'name' => 'required|min:3|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $req->name;
        if($req->password){
            $data['password'] = bcrypt($req->password);
            $data['password_show'] = $req->password;
        }

        $user->update($data);
        /*
        $user->update([
            'name' => $req->name,
            'password' => bcrypt($req->password),
            'password_show' => $req->password
        ]);
        */
        session()->flash('success','个人资料更新成功');

        return redirect()->route('users.show',$user->id);
    }

    public function destroy(UserModel $user){
        //UserPolicy里面destory方法中 只能时is_admin用户才能删除 且不能删除自己
        $this->authorize('destory',$user);
        $user->delete();
        session()->flash('success','成功删除用户！');
        return back();

    }
}
