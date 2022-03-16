@extends('layouts.default')
@section('title','登录')

@section('content')
<section class="p-5 bg-dark  text-center">
    <div class="container ">
        <div class="offset-md-3 col-md-6 text-center">
            <div class="card">
                <div class="card-header">
                    <h5 >登录</h5>
                    @include('shared._errors')
                </div>
                <div class="card-body">
                  
                 <form method="POST" action="{{ route('login') }}">
                     {{ csrf_field() }}

                       <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">邮箱</span>
                         <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="xxxxx@xxx.xxx" aria-label="email" aria-describedby="basic-addon1">
                       </div>
                       <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">密码（<a href="{{ route('password.request') }}">忘记密码</a>）</span>
                         <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                       </div>
                 
                      <div class="form-check mb-3 d-flex flex-row bd-highlight">
                        <input class="form-check-input bd-highlight" type="checkbox"  name="remember" id="flexCheckDefault">
                        <label class="form-check-label ms-1  bd-highlight" for="flexCheckDefault">
                         记住我
                        </label>
                      </div>
                     <button type="submit" class="btn btn-bd-download-active ">登录</button>
                </div>
                <p>还没账号？<a href="{{ route('user.signup') }}">现在注册！</a></p>
             </div>
        </div>
    </div>
</section>
@stop