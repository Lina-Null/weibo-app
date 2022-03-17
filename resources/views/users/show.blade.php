@extends('layouts.default')

@section('title',$user->name)


@section('content')
<section  class="p-5 bg-dark text-light text-center text-sm-start">
    <div class="container ">
        
        <div class="user container-lg">
            <div class="user-img text-center mt-2">
                <div class="user-header-img">
                        <img src="{{url('img/123.png')}}" alt="" style="width: 240px;height: auto;">
                </div>
                <button class="btn btn-bd-download mt-3">换头像</button>                
            </div>
            <div class="user-name mt-3 p-5">
                <div class="user-desc">
                    <span>嗨！</span>
                    <span class="fs-5 text-golden" >{{$user->name}}</span>
                    ,您于
                    <span class="fs-5 text-golden">{{$user->created_at}}</span>
                    成为了 Weibo-App的正式用户，我万分感谢你的信任和支持，这份信任弥足珍贵。
                    请一定专注于自己的核心目标，找准自己的节奏一步步执行，不浪费自己的时间和精力。
                    期待您早日形成强悍的业务能力，无论在职场还是从事自由职业都能获得更大的竞争优势。
                </div>
                <div class="admin-desc text-info mt-3 ">
                    Weibo-App致力于向用户提供高质量的资源。同时十分荣幸与你在这里相遇，愿以后的路，我们彼此扶持，共勉共进，我尽我最大努力帮助您节省更多时间，早点具备在职场抓住机会的能力；年轻无极限，青春却短暂，也请你不要偷懒，好好努力。
                </div>
            </div>
        </div>
       
    </div>
</section>
<section class="bg-dark text-light">
    <div class="container">
        <div class="weibo-header text-center pt-3">
            <h5 class="text-golden">发布的博客</h5>
        </div>
        <div class="user-weibo mt-3 p-5">
            @if($statuses->count() > 0 )
            <ul class="list-unstyled">
                @foreach($statuses as $status)
                    @include('statuses._status')
                @endforeach
            </ul>
            <div class="mt-5">
                {!! $statuses->render() !!}
            </div>
            @else 
            <p class="text-center text-info"> 没有数据！</p>
            @endif   
        </div>
    </div>
    
</section>
 
@stop