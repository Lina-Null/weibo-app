@extends('layouts.default')
@section('title','所有用户')

@section('content')
<section class="p-5 bg-dark text-light text-center text-sm-start">
    <div class="container">
        <div class="offset-md ">
            <h2 class="mb-4 text-center">所有用户</h2>
            <div class="list-group list-group-flush">
                @foreach($users as $user)
                  @include('users._users')
                @endforeach
            </div>

            <div class="mt-3 d-flex justify-content-center">
                {!! $users->render() !!}
            </div>


        </div>


    </div>

</section>

@stop