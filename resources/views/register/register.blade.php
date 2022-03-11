<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Weibo App') - 注册页</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

    @include('register._header')
        
       <section class="p-5 bg-dark  text-center">
           <div class="container ">
               <div class="offset-md-3 col-md-6 text-center">
                   <div class="card">
                       <div class="card-header">
                           <h5 >注册</h5>
                       </div>
                       <div class="card-body">
                         @include('shared._errors')
                        <form method="POST" action="{{ route('user.regEmail') }}">
                            {{ csrf_field() }}
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">名称</span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                  
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">邮箱</span>
                                <input type="text" class="form-control" placeholder="xxxxx@xxx.xxx" aria-label="email" aria-describedby="basic-addon1">
                              </div>
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">密码</span>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                              </div>
                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">密码</span>
                                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                              </div>
                            <button type="submit" class="btn btn-bd-download-active ">注册</button>
                       </div>
                        
                    </div>
               </div>
           </div>
       </section>
      
    @include('layouts._footer')
</body>
</html>