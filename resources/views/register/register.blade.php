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
        
       <section class="p-5 bg-dark text-light text-center">
           <div class="container ">
               <h1>注册页</h1>
           </div>
       </section>
      
    @include('layouts._footer')
</body>
</html>