<!DOCTYPE html>
<html>
    <head >
        <title>@yield('title','Weibo App') - 自由职业之路</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
       
    </head>
    <body>
  
      @include('layouts._header')
        
        @include('shared._messages')
        <section >
                @yield('content')
          </section> 
          @include('layouts._footer')
    </body>
</html>
