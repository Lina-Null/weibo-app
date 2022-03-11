@extends('layouts.default')
@section('title','注册')

@section('content')
        
       <section class="p-5 bg-dark  text-center">
           <div class="container ">
               <div class="offset-md-3 col-md-6 text-center">
                   <div class="card">
                       <div class="card-header">
                           <h5 >注册</h5>
                       </div>
                       <div class="card-body">
                        
                        <form method="POST" action="{{ route('user.regEmail') }}">
                            {{ csrf_field() }}
                            @include('shared._errors')
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">名称</span>
                                <input type="text" class="form-control"name="name" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                  
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">邮箱</span>
                                <input type="text" class="form-control" name="email" placeholder="xxxxx@xxx.xxx" aria-label="email" aria-describedby="basic-addon1">
                              </div>
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">密码</span>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                              </div>
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">确认密码</span>
                                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                              </div>
                            <button type="submit" class="btn btn-bd-download-active ">注册</button>
                       </div>
                        
                    </div>
               </div>
           </div>
       </section>
      
@stop