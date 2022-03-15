@extends('layouts.default')
@section('title','更新个人资料')

@section('content')
<section  class="p-5 bg-dark text-light text-center text-sm-start">
    <div class="container ">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>更新个人资料</h5>
                </div>

                <div class="card-body">
                    @include('shared._errors')

                    <div class="gravatar_edit">
                        <div class="user-header-img text-center">
                            <img src="{{url('img/123.png')}}" alt="" style="width: 120px;height: auto;">  
                        </div>
                    </div>

                    <form action="{{ route('users.update',$user->id)}}" method="POST">
                        {{method_field('PATCH')}}
                        {{csrf_field()}}
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">名称</span>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}"  aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">邮箱</span>
                            <input type="text" class="form-control" name="email" value="{{$user->email}}"  aria-label="email" aria-describedby="basic-addon1" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">密码</span>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">确认密码</span>
                            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-bd-download-active "> 更新 </button>
                          </div>
                       

                    </form>

                </div>
            </div>



        </div>

    </div>
</section>
@stop