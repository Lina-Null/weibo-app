@extends('layouts.default')
@section('title','所有用户')

@section('content')
<section class="p-5 bg-dark text-light text-center text-sm-start">
    <div class="container">
        <div class="offset-md ">
            <h2 class="mb-4 text-center">所有用户</h2>
            <div class="list-group list-group-flush">
                @foreach($users as $user)
                    <div class="list-group-item">
                        <img class="mr-3" src="{{url('img/123.png')}}" alt="" style="width:60px;height: auto;">
                        <a href="{{ route('users.show',$user)}}">
                            {{ $user->name }}
                        </a>
                    </div>
                @endforeach
            </div>



        </div>


    </div>

</section>

@stop