<?php
namespace App\Http\Controllers\StaticPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StaticPageController extends Controller
{
    public function home(){
        $feed_items = [];
        if(Auth::check()){
            $feed_items = Auth::user()->feed()->paginate(10);
        }
        return view('static_pages/home',compact('feed_items'));
    }

    public function help(){
        return view('static_pages/help');
    }

    public function about(){
        return view('static_pages/about');
    }
}
