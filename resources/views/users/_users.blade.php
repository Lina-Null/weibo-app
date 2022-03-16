<div class="list-group-item">
    <img class="mr-3" src="{{url('img/123.png')}}" alt="" style="width:60px;height: auto;">
    <a href="{{ route('users.show',$user)}}">
        {{ $user->name }}
    </a>
</div>