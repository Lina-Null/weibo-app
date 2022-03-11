<nav class="navbar navbar-expand-lg bg-dark navbar-dark bd-navbar  fixed-top nav-border">
    <div class="container">
        <a href="{{ route('index') }}" class="navbar-brand text-golden">我在Weibo-App学习</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="collapse navbar-collapse" id="navmenu"> -->
            <!-- ms-auto   margin start =margin left  -->
            <!-- <ul class="navbar-nav ms-auto"> 
                <li class="nav-item"><div class="nav-link">前端知识</div></li>
                <li class="nav-item"><div class="nav-link">后端知识</div></li>
                <li class="nav-item"><div class="nav-link">数据库知识</div></li>
            </ul>
        </div> -->
        <div class="collapse navbar-collapse " id="navmenu" >
            <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav pt-2 py-md-0">
              <li class="nav-item  col-md-auto">
                <a class="nav-link p-2 active" href="#" >前端知识</a>
              </li>
              <li class="nav-item  col-md-auto">
                <a class="nav-link p-2 " aria-current="true" href="#" >后端知识</a>
              </li>
              <li class="nav-item  col-md-auto">
                <a class="nav-link p-2" href="#" >大数据</a>
              </li>
              <li class="nav-item  col-md-auto">
                <a class="nav-link p-2" href="#" >人工智能</a>
              </li>
              <li class="nav-item  col-md-auto">
                <a class="nav-link p-2" href="#" >测试</a>
              </li>
              <li class="nav-item  col-md-auto">
                <a class="nav-link p-2" href="#" >爬虫</a>
              </li>
              <li class="nav-item  col-md-auto">
                <a class="nav-link p-2" href="#" >书籍</a>
              </li>
              <li class="nav-item  col-md-auto">
                <a class="nav-link p-2" href="#" >工具</a>
              </li>
            
            </ul>
      
            <hr class="d-md-none text-white-50">
            @if(Auth::check())
            <ul class="navbar-nav flex-row flex-wrap ms-md-auto ">
              <li class="nav-item col-6 col-md-auto dropdown user-name">
                  <!-- <div class=" d-flex flex-row   "> -->
                      <a class=" nav-link p-2 d-flex flex-row dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbarDropdown" href="#"  rel="noopener">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" class="navbar-nav-svg d-inline-block text-golden " viewBox="0 0 512 499.36" role="img"><title>GitHub</title><path fill="currentColor" fill-rule="evenodd" d="M256 0C114.64 0 0 114.61 0 256c0 113.09 73.34 209 175.08 242.9 12.8 2.35 17.47-5.56 17.47-12.34 0-6.08-.22-22.18-.35-43.54-71.2 15.49-86.2-34.34-86.2-34.34-11.64-29.57-28.42-37.45-28.42-37.45-23.27-15.84 1.73-15.55 1.73-15.55 25.69 1.81 39.21 26.38 39.21 26.38 22.84 39.12 59.92 27.82 74.5 21.27 2.33-16.54 8.94-27.82 16.25-34.22-56.84-6.43-116.6-28.43-116.6-126.49 0-27.95 10-50.8 26.35-68.69-2.63-6.48-11.42-32.5 2.51-67.75 0 0 21.49-6.88 70.4 26.24a242.65 242.65 0 0 1 128.18 0c48.87-33.13 70.33-26.24 70.33-26.24 14 35.25 5.18 61.27 2.55 67.75 16.41 17.9 26.31 40.75 26.31 68.69 0 98.35-59.85 120-116.88 126.32 9.19 7.9 17.38 23.53 17.38 47.41 0 34.22-.31 61.83-.31 70.23 0 6.85 4.61 14.81 17.6 12.31C438.72 464.97 512 369.08 512 256.02 512 114.62 397.37 0 256 0z"></path></svg>
                        <span class="m-2 text-golden">{{ Auth::user()->name }}</span>  
                      </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('users.show',Auth::user()) }}">个人中心</a>
                        <a href="" class="dropdown-item" href="#">编辑资料</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" id="logout" href="#">
                          <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field()}}
                            {{ method_field('DELETE')}}
                          <button class="btn btn-block btn-danger " type="submit" name="button">退出</button>
                          </form>
                        </a>
                     </div>
                  <!-- </div> -->
                 
                   
              </li>

            </ul>
          
            @else
            <a class="btn btn-bd-download d-lg-inline-block my-2 my-md-0 ms-md-2" href="{{ route('login') }}">登录</a>
            <a class="btn btn-bd-download d-lg-inline-block my-2 my-md-0 ms-md-2" href="{{ route('user.signup') }}">注册</a>
            @endif
          </div>
    </div>
</nav>