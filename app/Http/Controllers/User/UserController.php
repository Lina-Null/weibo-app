<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth',[
            'except' => ['show','create','store']
        ]);
    }
    //
    public function create(){
        return view('users.create');
    }

    //
    public function show(UserModel $user){
        //dump($user);
        return view('users.show',compact('user'));
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
}
