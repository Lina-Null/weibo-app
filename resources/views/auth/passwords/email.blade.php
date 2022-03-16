@extends('layouts.default')
@section('title','重置密码')

@section('content')
<section class="p-5 bg-dark  text-center">
    <div class="container ">
        <div class="offset-md-3 col-md-6 text-center">
            <div class="card">
                <div class="card-header">
                    <h5 >重置密码</h5>
                   
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                    @endif
                 <form method="POST" action="{{ route('password.email') }}">
                     {{ csrf_field() }}

                       <div class="input-group mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                         <span class="input-group-text" id="basic-addon1">邮箱地址:</span>
                         <input type="text" class="form-control" name="email" value="{{ old('email') }}"  aria-label="email" aria-describedby="basic-addon1">
                       
                            @if ($errors->has('email'))
                            <span class="form-text">
                            <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                     
                 
                    
                     <button type="submit" class="btn btn-bd-download-active ">发送密码重置邮箱</button>
                </div>
               
             </div>
        </div>
    </div>
</section>
@stop