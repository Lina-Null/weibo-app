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

    @include('layouts._header')
        
       <section>
           @yield('content')
       </section>
      
    @include('layouts._footer')
</body>
</html>