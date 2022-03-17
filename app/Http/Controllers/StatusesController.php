<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;
class StatusesController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    //创建微博
    public function store(Request $req){
        $this->validate($req,[
            'content' => 'required | max:140',
        ]);

        Auth::user()->statuses()->create([
            'content' => $req['content']
        ]);

        session()->flash('success','发布成功！');
        return redirect()->back();
    }

    public function destroy(Status $status){
        $this->authorize('destroy',$status);
        $status->delete();
        session()->flash('success','博客已删除！');
        return redirect()->back();
    }
}
